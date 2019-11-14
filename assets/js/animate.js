
function inviewExample() {
     var $example = $('#inview-example');
     var inview;
     if ($example.length) {
       inview = new Waypoint.Inview({
         element: $('#inview-example')[0],
         entered: function(direction) {
        	 $('.timer').each(function () {
          	   var $this = $(this);
          	   var val = $(this).data('count');
          	   jQuery({ Counter: 0 }).animate({ Counter: val }, {
          	     duration: 1000,
          	     easing: 'swing',
          	     step: function () {
          	       $this.text(Math.ceil(this.Counter));
          	     }
          	   });
          	 });
         }
       })
     }
 }
$(window).on('load', function() {
	inviewExample();
});

// $(function(){
//       $(".num1").numScroll({
//         number: 15,
//         'time': 1500,
//         'delay': 1000,
//         'fromZero': true,
//       });
//       $(".num2").numScroll({
//         number: 25,
//         'time': 1500,
//         'delay': 1000,
//         'fromZero': true,
//       });
//       $(".num3").numScroll({
//         number: 4500,
//         'time': 1500,
//         'delay': 1000,
//         'fromZero': true,
//       });
//       $(".num4").numScroll({
//         number: 4000,
//         'time': 1500,
//         'delay': 1000,
//         'fromZero': true,
//       });
//       $(".num5").numScroll({
//         number: 3500,
//         'time': 1500,
//         'delay': 1000,
//         'fromZero': true,
//       });
//     });
    