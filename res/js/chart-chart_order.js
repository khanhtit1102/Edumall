$(function() {
    var month_data = [
    {"period": "2012-12", "licensed": 3407, "sorned": 658},
    {"period": "2012-11", "licensed": 3407, "sorned": 623},
    {"period": "2012-10", "licensed": 3407, "sorned": 660},
    {"period": "2012-09", "licensed": 3351, "sorned": 629},
    {"period": "2012-08", "licensed": 3269, "sorned": 618},
    {"period": "2012-07", "licensed": 3246, "sorned": 661},
    {"period": "2012-06", "licensed": 3257, "sorned": 667},
    {"period": "2012-05", "licensed": 3248, "sorned": 627},
    {"period": "2012-04", "licensed": 3171, "sorned": 660},
    {"period": "2012-03", "licensed": 3171, "sorned": 676},
    {"period": "2012-02", "licensed": 3201, "sorned": 656},
    {"period": "2012-01", "licensed": 3215, "sorned": 622}
    ];
    Morris.Line({
      element: 'months-area-chart',
      data: month_data,
      xkey: 'period',
      ykeys: ['licensed', 'sorned'],
      labels: ['Licensed', 'SORN'],
      smooth: false
    });

    Morris.Donut({
      element: 'morris-donut-chart',
      data: [
      {value: 70, label: 'foo'},
      {value: 15, label: 'bar'},
      {value: 10, label: 'baz'},
      {value: 5, label: 'A really really long label'}
      ],
      formatter: function (x) { return x + "%"}
    })
      resize: true
});
