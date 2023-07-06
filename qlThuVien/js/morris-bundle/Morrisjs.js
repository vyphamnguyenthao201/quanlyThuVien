function chart_data() {
    var ret = [];
    for (var x = 0; x < labelnhaphang.length; x =x+1) {
        ret.push({
            y: labelnhaphang[x],a: thuonghieu[x],b: datanhaphang[x]});
        }
    return ret;
  };

config = {
    data: chart_data(),
    xkey: 'y',
    ykeys: ['b'],
    labels: ["Thời gian"],
    fillOpacity: 0.6,
    hideHover: 'auto',
    behaveLikeLine: true,
    resize: true,
    pointFillColors:['#ffffff'],
    pointStrokeColors: ['black'],
    lineColors:['green','red'],

    hoverCallback: function (index, options, content, row) {
        return  "<div style='margin: 5px;'> Thời gian: "+row.y+ "<br> Thương hiệu: " + row.a + "<br> Tổng tiền: " + row.b+"đ </div>";
        //return (content);
    }      
};
// console.log(type);
if(type ==="bar"){
    config.element = 'bar-chart';
    Morris.Bar(config);
}
else if(type === "line"){
    config.element = 'line-chart';
    Morris.Line(config);
}

