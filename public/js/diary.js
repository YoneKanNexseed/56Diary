$(document).on('click', '.js-like', function() {

    // いいねされた日記のIDを取得
    // $(this) : 今回クリックされたiタグ（ハートマーク）
    // .siblings('XXX') : 兄弟要素を取得する
    // val() : inputタグのvalueの値を取得する
    let diaryId = $(this).siblings('.diary-id').val();

    // likeメソッドを実行
    like(diaryId, $(this));
});

// diaryId：いいねする日記のID
// clickedBtn：今回クリックされたいいねアイコン
function like(diaryId, clickedBtn) {

    $.ajax({
        url: 'diary/' + diaryId + '/like',
        type: 'POST',
        dataType: 'json',
        // CSRF対策のため、tokenを送信する
        headers: {
            'X-CSRF-TOKEN': 
            $('meta[name="csrf-token"]').attr('content')
        }
    }).done((data) => {
        console.log(data);
        // いいねの数を増やす
        // 1. 現在のいいね数を取得
        // text() : <a>XXX</a> XXXの部分を取得
        let num = clickedBtn.siblings('.js-like-num').text();

        // numを数値に変換する
        num = Number(num);

        // 2. 1プラスした結果を設定する
        // text(YYY) : <a>XXX</a> XXXの部分をYYYに置き換える
        clickedBtn.siblings('.js-like-num').text(num + 1);

        // いいねのボタンのデザインを変更
        changeLikeBtn(clickedBtn);
    }).fail((error) => {
        console.log(error);
    });
}



// いいね解除の処理
$(document).on('click', '.js-dislike', function() {
    // いいね解除された日記のID取得
    let diaryId = $(this).siblings('.diary-id').val();

    // dislikeメソッドの実行
    dislike(diaryId, $(this));

});

function dislike(diaryId, clickedBtn) {

    $.ajax({
        url: 'diary/' + diaryId + '/dislike',
        type: 'POST',
        dataType: 'json',
        // CSRF対策のため、tokenを送信する
        headers: {
            'X-CSRF-TOKEN': 
            $('meta[name="csrf-token"]').attr('content')
        }
    }).done((data) => {
        console.log(data);
        // いいねの数を減らす
        // 1. 現在のいいね数を取得
        // text() : <a>XXX</a> XXXの部分を取得
        let num = clickedBtn.siblings('.js-like-num').text();

        // numを数値に変換する
        num = Number(num);

        // 2. 1マイナスした結果を設定する
        // text(YYY) : <a>XXX</a> XXXの部分をYYYに置き換える
        clickedBtn.siblings('.js-like-num').text(num - 1);

        // いいねのボタンのデザインを変更
        changeLikeBtn(clickedBtn);
    }).fail((error) => {
        console.log(error);
    });
}

// btn：色を変えたいいいねアイコン
// js-like, js-dislikeの切り替え
function changeLikeBtn(btn) {
    btn.toggleClass('far').toggleClass('fas');
    btn.toggleClass('js-like').toggleClass('js-dislike');
}

// function hello(){
//     console.log('Hello');
// }

// function add(num1, num2){
//     console.log(num1 + num2);
// }

// add(2, 4)
// add(22, 24)