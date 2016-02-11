





<!DOCTYPE html>
<html lang='ja'>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<head>
    <meta charset='utf-8'>
    <title>アンケート作成画面</title>
    <h1>アンケート作成画面</h1>

<?php
session_start();
include_once('../func.php');

//セッションチェックとregenerate
if( !isset($_SESSION['ssid']) || ($_SESSION['ssid'] != session_id()) ){
    echo "LOGIN ERROR";
    exit();
}
//セッションハイジャック対策
session_regenerate_id();
$_SESSION['ssid'] = session_id();

?>

</head>
<body>
<script>
$(document).ready(function(){


//        To do：質問の削除・修正も必要。
//        To do：数値を入力可能にする。
//        To do：テキストエリアを入力可能にする。
//        To do：宛先などの指定。
//        To do：連続で入力できない。上のボタンでnumberをいじってるせい。下のボタンだけで完結しないとダメー＞難しい…下を隠した方がいいかも。


    //選択項目に一意に番号を付けるための変数
    var count=0;
    //質問名称に一意に番号を付けるためのの変数
    var qNameNumber=0;
    //配列で質問の分類と質問名と選択項目を入れる。で、それに合わせて表示する。
    //選択項目は配列を文字列化してから格納。テキストボックスの選択項目の中身は当初は空で良い。
    //To do：セキュリティへの配慮。
    //最終的な配列の箱。
    var questionnaire=Array();
    //個々の質問を入れる箱。
    var qaArray=Array();
    //質問の分類と選択項目を一度に入れる箱。
    var formTypeArray = ['テキストボックス', 'ラジオボタン', 'セレクトボックス', 'チェックボックス'];
    var qaTempArray=Array();

    
//    質問名称の記入のためのボタン。
    $('#qNameInput').on('click',function(){
        var qForm = $('#qForm option:selected').val();
//      テキストボックスの時は項目名の記入のみで問題なし。    
        if( qForm=='テキストボックス' ){
            qNameExpress('質問名称');
        } else {
            //まずqNameのリストを空にする。
            $('#qName').empty();
            qNameNumber=qNameNumber+1;
            $('#qName').append('<span>質問名称：</span>');
            $('#qName').append('<input type="text" name= "question'+qNameNumber+'" id="question'+qNameNumber+'"><br>');        
            qNameExpress('選択項目');
        }
    });
    
//    選択項目のボックス表示のための関数。    
    function qNameExpress(Name){
        var qQuantity= $('#qQuantity option:selected').val();
        for (k=1; k<=qQuantity; ++k){
            $('#qName').append('<span>'+Name+k+'：</span>');
            $('#qName').append('<input type="text" name= "question'+k+'" id="question'+k+'"><br>');        
        }
    }

//    最終的なデータ送信のためのボタン。
    $('#qSend').on('click', function(){
        var qaTitle=$('#questionnaireName').val();
        $.ajax({
            url: "questionnaireSend.php",
            type: "POST",
            data: {
                "qa":questionnaire,
                "qaTitle":qaTitle
            },
            success: function(rdata){
                location.href='../userPage.php';
            }
        });
    });
    
//    質問の追加のためのボタン。長いので後ほど各部分を関数化するかもしれません。
    $('#qCreation').on('click',function(){
        var qQuantity= $('#qQuantity option:selected').val();
        var qForm = $('#qForm option:selected').val();
        
        switch (qForm){
//        テキストボックスの場合
            case formTypeArray[0]:
                //ここだけ特殊なためqNameNumberを調整。
                for (l=1; l<=qQuantity; ++l){
                    count=count+1;
                    qNameNumber=qNameNumber+1;
                    var qValue='#question'+l;
                    var qName=$(qValue).val();
                    //配列の格納。
                    qaArray=[formTypeArray[0],'1',qName,''];
                    questionnaire[qNameNumber-1]=qaArray;
                    $('#questionnaire').append('<span>'+qName+'：</span>');
                    $('#questionnaire').append('<input type="text" name= "answername'+count+'" id="answername'+count+'"><br>');
                }
                //入力フォームの初期化処理
                $('#qName').html('');
                qNameExpress('質問名称');
                break;

//        ラジオボタンの場合
            case formTypeArray[1]:
                //質問名の追加。
                var qValue='#question'+qNameNumber;
                var qName=$(qValue).val();
                $('#questionnaire').append('<span name="answername'+qNameNumber+'" id="answername'+qNameNumber+'">'+qName+'：</span>');
                //ラジオボタンの場合のみ、nameを一意にする必要があるので別の変数が必要。
                //配列の格納。
                qaArray=[formTypeArray[1],qQuantity,qName,''];
                //項目名の追加。
                for (l=1; l<=qQuantity; ++l){
                    count=count+1;
                    qValue='#question'+l;
                    var qSubName=$(qValue).val();
                    qaTempArray[l-1]=qSubName;
                    $('#questionnaire').append('<input type="radio" name= "answer'+qNameNumber+'" id="answer'+count+'" value='+qSubName+'>'+qSubName);
                }
                $('#questionnaire').append('<br>');
                //選択項目の個数を入れ、配列を文字列化。
                qaArray[3]=qaTempArray.join(',');
                questionnaire[qNameNumber-1]=qaArray;
                //入力フォームの初期化処理
                $('#qName').html('');
                $('#qName').append('<span>質問名称：</span>');
                $('#qName').append('<input type="text" name= "question'+qNameNumber+'" id="question'+qNameNumber+'"><br>');        
                qNameExpress('選択項目');
                break;
        
//        セレクトボックスの場合
            case formTypeArray[2]:
                count=count+1;
                //質問名の追加。
                var qValue='#question'+qNameNumber;
                var qName=$(qValue).val();
                $('#questionnaire').append('<span name="answername'+qNameNumber+'" id="answername'+qNameNumber+'">'+qName+'：</span>');
                //配列の格納。
                qaArray=[formTypeArray[2],qQuantity,qName,''];
                //セレクトボックスの追加。jqueryだとうまく行かなかったので、jqueryを使わず。
                qValue='answer'+count;                
                var selectHtml=document.createElement('select');
                var selectbutton=document.getElementById('questionnaire').appendChild(selectHtml);
                selectbutton.setAttribute('id', qValue);
                //項目名の追加。
                for (l=1; l<=qQuantity; ++l){
                    var qSubValue='#question'+l;
                    var qSubName=$(qSubValue).val();
                    qaTempArray[l-1]=qSubName;
                    var optionHtml=document.createElement('option');
                    optionHtml.value=qSubName;
                    optionHtml.text=qSubName;
                    selectbutton.appendChild(optionHtml);
                }
                $('#questionnaire').append('</select><br>');
                //選択項目の個数を入れ、配列を文字列化。
                qaArray[3]=qaTempArray.join(',');
                questionnaire[qNameNumber-1]=qaArray;
                //入力フォームの初期化処理
                $('#qName').html('');
                $('#qName').append('<span>質問名称：</span>');
                $('#qName').append('<input type="text" name= "question'+qNameNumber+'" id="question'+qNameNumber+'"><br>');        
                qNameExpress('選択項目');
                break;

//        チェックボックスの場合
            case formTypeArray[3]:
                //質問名の追加。
                var qValue='#question'+qNameNumber;
                var qName=$(qValue).val();
                //配列の格納。
                qaArray=[formTypeArray[3],qQuantity,qName,''];
                $('#questionnaire').append('<span name="answername'+qNameNumber+'" id="answername'+qNameNumber+'">'+qName+'：</span>');
                //項目名の追加。
                for (l=1; l<=qQuantity; ++l){
                    count=count+1;
                    var qSubValue='#question'+l;
                    var qSubName=$(qSubValue).val();
                    qaTempArray[l-1]=qSubName;
                    $('#questionnaire').append('<input type="checkbox" name= "answer'+count+'" id="answer'+count+'" value='+qSubName+'>'+qSubName);
                }
                $('#questionnaire').append('<br>');
                qaArray[3]=qaTempArray.join(',');
                questionnaire[qNameNumber-1]=qaArray;
                //入力フォームの初期化処理
                $('#qName').html('');
                $('#qName').append('<span>質問名称：</span>');
                $('#qName').append('<input type="text" name= "question'+qNameNumber+'" id="question'+qNameNumber+'"><br>');        
                qNameExpress('選択項目');
                break;
        }
        console.log(questionnaire);
    });
});
</script>
    <span>アンケート名：</span>
    <input id='questionnaireName' type='text'>
    <br>
    <span>質問形式：</span>
    <select id='qForm'>
        <option>テキストボックス</option>
        <option>ラジオボタン</option>
        <option>セレクトボックス</option>
        <option>チェックボックス</option>
    </select>
    <span>質問項目数：</span>
    <select id='qQuantity'>
    <script>
        var i=0;
        for (i=1; i<100; ++i){
        document.write('<option value=' + i + '>' + i + '</option>');
        }
    </script>
    </select>
    <br>
    <input id='qNameInput' type='button' value='項目名記入'>
    <br>
    <ul id='qName'></ul>
    <input id='qCreation' type='button' value='質問追加'>
    <ul id='questionnaire'></ul>
    <input id='qSend' type='button' value='アンケート作成'>
    
</body>
</html>

