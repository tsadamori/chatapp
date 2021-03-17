require('./bootstrap');

const app = new Vue({
    el: '#app',
    data: {
        messages: [],
    },
    mounted() {
        // DBのメッセージを表示
        var self = this;
        var url = 'ajax/getMessages';
        axios.get(url).then((res) => {
            res.data.forEach((val, index) => {
                var created_at = format_date(new Date(val.created_at));
                self.messages.push({
                    body: val.message,
                    // 自分の投稿かどうか判定
                    me: val.me,
                    // me: false,
                    nickname: val.nickname,
                    created_at: created_at,
                });
            });
        });
    },
    methods: {
        addItem: function(e) {
            var message = document.getElementById('message').value;
            if (message != '') {
                // DBにメッセージを保存
                var url1 = 'ajax/postMessage';
                var data = {
                    message: message,
                }
                axios.post(url1, data).then(() => {
                    console.log('メッセージを登録しました');
                });
    
                var url2 = 'ajax/getNickname';
                axios.get(url2).then((res) => {
                    var now = format_date(new Date());
                    // messagesにデータを格納
                    this.messages.unshift({
                        body: message,
                        me: true,
                        nickname: res.data.nickname,
                        created_at: now,
                    });
                });
            }
            document.getElementById('message').value = '';
        }
    }
});

function format_date(date)
{
    // MM月DD日　hh:mm分にフォーマット
    var formatted_date = 
        toDoubleDigits(date.getMonth() + 1) + '/'
        + toDoubleDigits(date.getDate()) + ' '
        + toDoubleDigits(date.getHours()) + ':'
        + toDoubleDigits(date.getMinutes());
    
    return formatted_date;
}

function toDoubleDigits(num)
{
    num += '';
    if (num.length == 1) {
        num = '0' + num;
    }
    return num;
}