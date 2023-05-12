//[Dashboard 4 Javascript]

//Project:	Bonito Admin - Responsive Admin Template
//Primary use:   Used only for the main dashboard 4 (index4.html)


$(function () {

  'use strict';

  // Make the dashboard widgets sortable Using jquery UI
  $('.connectedSortable').sortable({
    placeholder         : 'sort-highlight',
    connectWith         : '.connectedSortable',
    handle              : '.box-header, .nav-tabs',
    forcePlaceholderSize: true,
    zIndex              : 999999
  });
  $('.connectedSortable .box-header, .connectedSortable .nav-tabs-custom').css('cursor', 'move');

  // jQuery UI sortable for the todo list
  $('.todo-list').sortable({
    placeholder         : 'sort-highlight',
    handle              : '.handle',
    forcePlaceholderSize: true,
    zIndex              : 999999
  });

  // bootstrap WYSIHTML5 - text editor
  $('.textarea').wysihtml5();

  $('.daterange').daterangepicker({
    ranges   : {
      'Today'       : [moment(), moment()],
      'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
      'This Month'  : [moment().startOf('month'), moment().endOf('month')],
      'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment().subtract(29, 'days'),
    endDate  : moment()
  }, function (start, end) {
    window.alert('You chose: ' + start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
  });


  /* jVector Maps
   * ------------
   * Create a world map with markers
   */
	
	jQuery('#visitfromworld').vectorMap({
        map: 'world_mill_en',
        backgroundColor: '#fff',
        borderColor: '#000',
        borderOpacity: 1,
        borderWidth: 1,
        zoomOnScroll : false,
        color: '#ddd',
        regionStyle: {
            initial: {
                fill: '#ccc',
            }
        },
        markerStyle: {
            initial: {
                r: 8,
                 'fill': '#26c6da',
                 'fill-opacity': 1,
                 'stroke': '#000',
                 'stroke-width': 0,
                 'stroke-opacity': 1,
            }
         },
         enableZoom: true,
         hoverColor: '#79e580',
         markers: [{
            latLng: [21.00, 78.00],
            name: 'India : 9347',
            style: {fill: '#26c6da'}
        },
      {
        latLng : [-33.00, 151.00],
        name : 'Australia : 250',
        style: {fill: '#02b0c3'}
      },
      {
        latLng : [36.77, -119.41],
        name : 'USA : 250',
        style: {fill: '#11a0f8'}
      },
      {
        latLng : [55.37, -3.41],
        name : 'UK   : 250',
         style: {fill: '#745af2'}
      },
      {
        latLng : [25.20, 55.27],
        name : 'UAE : 250',
        style: {fill: '#ffbc34'}
      }],
         hoverOpacity: null,
         normalizeFunction: 'linear',
         scaleColors: ['#fff', '#ccc'],
         selectedColor: '#c9dfaf',
         selectedRegions: [],
         showTooltip: true,
         onRegionClick: function (element, code, region) {
            var message = 'You clicked "' + region + '" which has the code: ' + code.toUpperCase();
            alert(message);
        }
    });


  // -----------------
  // - SPARKLINE BAR -
  // -----------------
  $('.sparkbar').each(function () {
    var $this = $(this);
    $this.sparkline('html', {
      type    : 'bar',
      height  : $this.data('height') ? $this.data('height') : '30',
      barColor: $this.data('color')
    });
  });
  
  
// chart
	$("#linechart").sparkline([1,4,3,7,6,4,8,9,6,8,12], {
		type: 'line',
		width: '150',
		height: '60',
		lineColor: '#06d79c',
		fillColor: '#ffffff',
		lineWidth: 2,
		minSpotColor: '#0fc491',
		maxSpotColor: '#0fc491',
	});

	$("#barchart").sparkline([1,4,3,7,6,4,8,9,6,8,12], {
		type: 'bar',
		height: '60',
		barWidth: 6,
		barSpacing: 4,
		barColor: '#e9ab2e',
	});
	$("#discretechart").sparkline([1,4,3,7,6,4,8,9,6,8,12], {
		type: 'discrete',
		width: '150',
		height: '60',
		lineColor: '#745af2',
	});
		
	

	
  // SLIMSCROLL FOR CHAT WIDGET
   $('#products-list').slimScroll({
    height: '325px'
  });

// AREA CHART	
	
 var area = new Morris.Area({
        element: 'revenue-chart',
        data: [{
            period: '2010',
            iMac: 0,
            iPhone: 0,
            
        }, {
            period: '2011',
            iMac: 130,
            iPhone: 100,
            
        }, {
            period: '2012',
            iMac: 30,
            iPhone: 60,
            
        }, {
            period: '2013',
            iMac: 30,
            iPhone: 200,
            
        }, {
            period: '2014',
            iMac: 200,
            iPhone: 150,
            
        }, {
            period: '2015',
            iMac: 105,
            iPhone: 90,
            
        },
         {
            period: '2016',
            iMac: 250,
            iPhone: 150,
           
        }],
        xkey: 'period',
        ykeys: ['iMac', 'iPhone'],
        labels: ['iMac', 'iPhone'],
        pointSize: 0,
        fillOpacity: 0.4,
        pointStrokeColors:['#b4becb', '#01c0c8'],
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        lineWidth: 0,
        smooth: true,
        hideHover: 'auto',
        lineColors: ['#b4becb', '#01c0c8'],
        resize: true
        
    });


}); // End of use strict
