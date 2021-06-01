var hour = new Date().getHours();

if (hour >= 16 && hour <= 19) {
    window.alert("もうすぐ退社の時間だよ！！");
} else if (hour === 12 || hour === 15) {
    window.alert("そろそろ休憩しよう！！")
} else {
    window.alert("お仕事頑張ってください！ファイト！！")
}