new Chart("doanhthu",{
    type: type,
    data:{
        labels: label,
        datasets:[{
            label: "Tổng tiền",
            data: data,
            backgroundColor: "green",
        }]
    },
    options:{
        legend:{
            display: true,
            position: 'bottom',
        },
        labels:{
            fontColor: '#71748d',
            fontFamily: 'Circular Std Book',
            fontSize: 14,
        }
    }
});
new Chart("donhang",{
    type: type,
    data:{
        labels: labeldonhang,
        datasets:[{
            label: "Số lượng",
            data: datadonhang,
            backgroundColor: "green",
        }]
    },
    options:{
        legend:{
            display: true,
            position: 'bottom',
        },
        labels:{
            fontColor: '#71748d',
            fontFamily: 'Circular Std Book',
            fontSize: 14,
        }
    }
});
new Chart("nhaphang",{
    type: type,
    data:{
        labels: labelnhaphang,
        datasets:[{
            label: "Tổng tiền",
            data: datanhaphang,
            backgroundColor: "green",
        }]
    },
    options:{
        legend:{
            display: true,
            position: 'bottom',
        },
        labels:{
            fontColor: '#71748d',
            fontFamily: 'Circular Std Book',
            fontSize: 14,
        }
    }
});
