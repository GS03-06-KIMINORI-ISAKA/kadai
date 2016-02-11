




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
//    質問名称の記入のためのボタン。
//    まず全部項目を入れさせて、その後で並べさせるようにする。
    
    //項目追加時に番号を一意にするためのの変数
    var count=0;
    //質問名称を参照するためのの変数
    var qNameInputClick=0;

    $('#qNameInput').on('click',function(){
        var qForm = $('#qForm option:selected').val();
//      テキストボックスの時は項目名の記入のみで問題なし。    
        if( qForm=='テキストボックス' ){
            qNameExpress()
        } else {
            //まずqNameのリストを空にする。
            $('#qName').empty();
            qNameInputClick=qNameInputClick+1;
            $('#qName').append('<span>質問名称：</span>');
            $('#qName').append('<input type="text" name= "question'+qNameInputClick+'" id="question'+qNameInputClick+'"><br>');        
            qNameExpress();
        }
    });
    
//    選択項目のボックス表示のための関数。    
    function qNameExpress(){
        var qQuantity= $('#qQuantity option:selected').val();
        for (k=1; k<=qQuantity; ++k){
            $('#qName').append('<span>選択項目'+k+'：</span>');
            $('#qName').append('<input type="text" name= "question'+k+'" id="question'+k+'"><br>');        
        }
    }

//    質問の追加のためのボタン
    $('#qCreation').on('click',function(){
        var j= $('#qQuantity option:selected').val();
        var qForm = $('#qForm option:selected').val();
        
        var formType = ['テキストボックス', 'ラジオボタン', 'セレクトボックス', 'チェックボックス'];
        var k=0;

//        To do：質問の削除・修正も必要。
//        To do：数値を入力可能にする。
//        To do：テキストエリアを入力可能にする。

//        テキストボックスの場合
        switch (qForm){
            case formType[0]:                
                for (l=1; l<=j; ++l){
                    count=count+1;
                    var qValue='#question'+l;
                    var qName=$(qValue).val();
                    $('#questionnaire').append('<span>'+qName+'：</span>');
                    $('#questionnaire').append('<input type="text" name= "answer'+count+'" id="answer'+count+'"><br>');
                }
                //入力フォームの初期化処理
                $('#qName').html('');
                qNameExpress();
                break;
        }

//        ラジオボタンの場合
        switch (qForm){
            case formType[1]:
                //質問名の追加。
                var qValue='#question'+qNameInputClick;
                var qName=$(qValue).val();
                $('#questionnaire').append('<span>'+qName+'：</span>');
                //項目名の追加。
                var tempcount=count+1;
                for (l=1; l<=j; ++l){
                    count=count+1;
                    qValue='#question'+l;
                    var qSubName=$(qValue).val();
                    $('#questionnaire').append('<input type="radio" name= "answer'+tempcount+'" id="answer'+count+'" value='+qSubName+'>'+qSubName);
                }
                $('#questionnaire').append('<br>');
                //入力フォームの初期化処理
                $('#qName').html('');
                qNameExpress();
                break;
        }
        
//        セレクトボックスの場合
        switch (qForm){
            case formType[2]:
                count=count+1;
                //質問名の追加。
                var qValue='#question'+qNameInputClick;
                var qName=$(qValue).val();
                $('#questionnaire').append('<span>'+qName+'：</span>');
                //セレクトボックスの追加。jqueryだとうまく行かなかったので、jqueryを使わず。
                var qValue='answer'+count;                
                var selectHtml=document.createElement('select');
                var selectbutton=document.getElementById('questionnaire').appendChild(selectHtml);
                selectbutton.setAttribute('id', qValue);
                //項目名の追加。
                for (l=1; l<=j; ++l){
                    qValue='#question'+l;
                    var qName=$(qValue).val();
                    var optionHtml=document.createElement('option');
                    optionHtml.value=qName;
                    optionHtml.text=qName;
                    selectbutton.appendChild(optionHtml);
                }
                $('#questionnaire').append('</select><br>');
                //入力フォームの初期化処理
                $('#qName').html('');
                qNameExpress();
                break;
        }

//        チェックボックスの場合
        switch (qForm){
            case formType[3]:
                //質問名の追加。
                var qValue='#question'+qNameInputClick;
                var qName=$(qValue).val();
                $('#questionnaire').append('<span>'+qName+'：</span>');
                //項目名の追加。
                for (l=1; l<=j; ++l){
                    count=count+1;
                    var qValue='#question'+l;
                    var qName=$(qValue).val();
                    $('#questionnaire').append('<input type="checkbox" name= "answer'+count+'" id="answer'+count+'" value='+qName+'>'+qName);
                }
                $('#questionnaire').append('<br>');
                //入力フォームの初期化処理
                $('#qName').html('');
                qNameExpress();
                break;
        }
    });
});
</script>
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
    <input id='qNameInput' type='button' value='項目名記入'>
    <br>
    <ul id='qName'></ul>
    <input id='qCreation' type='button' value='質問追加'>
    <ul id='questionnaire'></ul>
    <input id='qSend' type='button' value='アンケート作成' onclick='location.href=""'>
    
</body>
</html>

