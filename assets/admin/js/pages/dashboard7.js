//[Dashboard Javascript]

//Project:  Bonito Admin - Responsive Admin Template
//Primary use:   Used only for the main dashboard (index.html)


$(function () {

  'use strict';

  	const dataSource = {
	  chart: {
		caption: "App Publishing Trend",
		subcaption: "2012-2016",
		xaxisname: "Years",
		yaxisname: "Total number of apps in store",
		formatnumberscale: "1",
		plottooltext:
		  "<b>$dataValue</b> apps were available on <b>$seriesName</b> in $label",
		theme: "fusion",
		drawcrossline: "1"
	  },
	  categories: [
    {
      category: [
        {
          label: "2012"
        },
        {
          label: "2013"
        },
        {
          label: "2014"
        },
        {
          label: "2015"
        },
        {
          label: "2016"
        }
      ]
    }
  ],
  dataset: [
    {
      seriesname: "iOS App Store",
      data: [
        {
          value: "125000"
        },
        {
          value: "300000"
        },
        {
          value: "480000"
        },
        {
          value: "800000"
        },
        {
          value: "1100000"
        }
      ]
    },
    {
      seriesname: "Google Play Store",
      data: [
        {
          value: "70000"
        },
        {
          value: "150000"
        },
        {
          value: "350000"
        },
        {
          value: "600000"
        },
        {
          value: "1400000"
        }
      ]
    },
    {
      seriesname: "Amazon AppStore",
      data: [
        {
          value: "10000"
        },
        {
          value: "100000"
        },
        {
          value: "300000"
        },
        {
          value: "600000"
        },
        {
          value: "900000"
        }
      ]
    }
  ]
};

	FusionCharts.ready(function() {
  var myChart = new FusionCharts({
    type: "mscolumn2d",
    renderAt: "overview",
    width: "100%",
    height: "400",
    dataFormat: "json",
    dataSource
  }).render();
});
	
}); // End of use strict

$(function () {
  'use strict';	
	
	const dataSource = {
	  chart: {
		showvalues: "1",
		showpercentintooltip: "0",
		numberprefix: "$",
		enablemultislicing: "1",
		theme: "fusion"
	  },
	  data: [
		{
		  label: "Impressions",
		  value: "300000"
		},
		{
		  label: "Top",
		  value: "230000"
		},
		{
		  label: "Conversions",
		  value: "180000"
		},
		{
		  label: "CPA",
		  value: "270000"
		}
	  ]
	};

	FusionCharts.ready(function() {
	  var myChart = new FusionCharts({
		type: "pie3d",
		renderAt: "campaign",
		width: "100%",
		height: "313",
		dataFormat: "json",
		dataSource
	  }).render();
	});


}); // End of use strict

$(function () {
  'use strict';	
	
	const dataSource = {
	  chart: {
		theme: "fusion",
		showvalues: "1",
		numbersuffix: "%",
		plottooltext: "<b>$dataValue</b> of people have a fear for <b>$label</b>"
	  },
	  data: [
		{
		  label: "Lonliness",
		  value: "2"
		},
		{
		  label: "Snakes",
		  value: "2"
		},
		{
		  label: "Losing People I Love",
		  value: "3"
		},
		{
		  label: "Clowns",
		  value: "5"
		},
		{
		  label: "People",
		  value: "6"
		},
		{
		  label: "Heights",
		  value: "11"
		},
		{
		  label: "Spiders and Other Bugs",
		  value: "12"
		},
		{
		  label: "Death",
		  value: "17"
		},
		{
		  label: "Failure",
		  value: "18"
		},
		{
		  label: "Others",
		  value: "24"
		}
	  ]
	};

	FusionCharts.ready(function() {
	  var myChart = new FusionCharts({
		type: "pyramid",
		renderAt: "work-overview",
		width: "100%",
		height: "500",
		dataFormat: "json",
		dataSource
	  }).render();
	});

}); // End of use strict

$(function () {
  'use strict';	
	
const URL_DATA = 'https://raw.githubusercontent.com/fusioncharts/dev_centre_docs/master/assets/datasources/fusiontime/examples/online-sales-single-series/data.json';
const URL_SCHEMA = 'https://raw.githubusercontent.com/fusioncharts/dev_centre_docs/master/assets/datasources/fusiontime/examples/online-sales-single-series/schema.json';

const jsonify = res => res.json();
const dataFetch = fetch(URL_DATA).then(jsonify);
const schemaFetch = fetch(URL_SCHEMA).then(jsonify);

Promise.all([dataFetch, schemaFetch]).then(([data, schema]) => {
  var fusionTable = new FusionCharts.DataStore().createDataTable(data, schema);

  new FusionCharts({
    type: 'timeseries',
    renderAt: 'sales-overview',
    width: "100%",
    height: 500,
    dataSource: {
      data: fusionTable,
      chart: {
      exportEnabled: 1
      },
      yAxis: {
        "plot": {
          "value": "Sales",
          "type": "line"
        },
      }
    }
  }).render();

});


}); // End of use strict