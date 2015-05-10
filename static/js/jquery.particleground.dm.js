/**
 * Particleground demo
 * @author Jonathan Nicol - @mrjnicol
 */

$(document).ready(function() {
  $('#particles').particleground({
    /*dotColor: '#e0e0e0',
    lineColor: '#e0e0e0',*/
    dotColor: '#EFEFEF',
    lineColor: '#EFEFEF',	
	minSpeedX :0.5,
	maxSpeedX :1,
	minSpeedY : 0.5,
	maxSpeedY :1
  });
});