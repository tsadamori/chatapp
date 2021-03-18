require('./bootstrap');

// import Vue
import Vue from 'vue/dist/vue.esm';
// import Bootstrap
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
// import Vue Matrial
import VueMaterial from 'vue-material';
import 'vue-material/dist/vue-material.css'
Vue.use(VueMaterial);

const app = new Vue({
    el: '#app',
    data: {
        messages: [],
    },
    // DOMが作成された直後に実行される
    mounted() {
        var self = this;
        var url = 'ajax/getMessages';
        // DBのメッセージを表示
        axios.get(url).then((res) => {
            console.log(res.data);
            res.data.forEach((val, index) => {
                var created_at = formatDate(new Date(val.created_at));
                self.messages.push({
                    body: val.message,
                    nickname: val.nickname,
                    created_at: created_at,
                });
            });
        });
    },
    methods: {
        // メッセージ投稿ボタンがクリックされたら
        // DBにメッセージを保存し、タイムラインに表示するmethod
        addItem: function(e) {
            var message = document.getElementById('message').value;
            if (message != '') {
                // DBにメッセージを保存
                var urlPost = 'ajax/postMessage';
                var data = {
                    message: message,
                }
                axios.post(urlPost, data).then(() => {
                    console.log('メッセージを登録しました');
                });
    
                // ニックネーム取得
                var urlGet = 'ajax/getNickname';
                axios.get(urlGet).then((res) => {
                    var now = formatDate(new Date());
                    // messagesにデータを格納
                    this.messages.unshift({
                        body: message,
                        nickname: res.data.nickname,
                        created_at: now,
                    });
                });
            }
            document.getElementById('message').value = '';
        }
    }
});

/**
 * 日付をフォーマットする関数
 * @param {datetime} date メッセージの投稿日付
 */
function formatDate(date)
{
    // MM月DD日　hh:mm分にフォーマット
    var formatted_date = 
        toDoubleDigits(date.getMonth() + 1) + '/'
        + toDoubleDigits(date.getDate()) + ' '
        + toDoubleDigits(date.getHours()) + ':'
        + toDoubleDigits(date.getMinutes());
    
    return formatted_date;
}

/**
 * メッセージの投稿日付を2桁表示にする関数
 * @param {number} num メッセージの投稿月,日,時,分
 */
function toDoubleDigits(num)
{
    num += '';
    if (num.length == 1) {
        num = '0' + num;
    }
    return num;
}