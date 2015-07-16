/**
 * JS全局函数
 *
 * @param id
 * @returns {HTMLElement}
 */

/**
 * 获取dom。document.getElementById()的别名函数
 *
 * @param id
 * @returns {HTMLElement}
 */
function g(id) {
    return document.getElementById(id);
}
/**
 * 获取元素的位置
 *
 * @param object e
 *
 * @return array [x.y]
 */
function getPosition(e) {
	var left = 0;
	var top = 0;
	/*
	 if (document.all) {
	 if (e.tagName === 'BODY') {
	 return [0, 0];
	 }

	 var pos = e.getBoundingClientRect();
	 return [pos.left + (document.documentElement.scrollLeft ?
	 document.documentElement.scrollLeft :
	 document.body.scrollLeft), pos.top + (document.documentElement.scrollTop ?
	 document.documentElement.scrollTop :
	 document.body.scrollTop)];
	 }
	 */

	while (e.offsetParent) {
		left += e.offsetLeft;
		top += e.offsetTop;
		e = e.offsetParent;
	}

	left += e.offsetLeft;
	top += e.offsetTop;
	return [left, top];
}
