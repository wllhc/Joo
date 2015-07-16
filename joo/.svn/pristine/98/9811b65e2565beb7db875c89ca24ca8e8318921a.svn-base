/*************工具类函数 开始****************/
var $_$, 
ATONG =ATONG || {};

ATONG.$ = function (id) {
    return document.getElementById(id);
};

ATONG.nameSpace = function ( name ) {
    var parts = name.split( '.' ),
    current = ATONG;
    for ( var i in parts ) {
        if ( !current[ parts[ i ] ] ) {
            current[ parts[ i ] ] = {};
        }
        current = current[ parts[ i ] ];
    }
};

ATONG.nameSpace('util');

ATONG.util.myAddEvent = function ( obj, sEv, fn ) {
    if ( obj.addEventListener ) {
        obj.addEventListener( sEv ,fn ,false );
    }
    else {
        obj["on" + sEv] = fn;
    }
};

ATONG.util.myRemoveEvent = function ( obj, sEv, fn ) {
    if ( obj.removeEventListener ) {
        obj.removeEventListener( sEv ,fn ,false );
    }
    else {
        obj["on" + sEv] = null;
    }
};

ATONG.util.createEle = function (tag) {
    return document.createElement(tag);
};

ATONG.util.getStyle = function (obj, name) {
    if(obj.currentStyle) {
        return obj.currentStyle[name];
    }
    else {
        return getComputedStyle(obj, 3.5)[name];
    }
};

ATONG.util.getPos = function (obj) {
    var l=0,t=0;
    while(obj) {
        l+=obj.offsetLeft;
        t+=obj.offsetTop;		
        obj=obj.offsetParent;
    }	
    return {
        left: l, 
        top: t
    };
};

ATONG.util.getByClass = function (oParent, sClass) {
    if( document.getElementsByClassName ) {
        return oParent.getElementsByClassName( sClass );
    }
    else {
        var aEle=oParent.getElementsByTagName('*'),
        aResult=[],
        i=0;
        re=new RegExp('\\b'+sClass+'\\b');
     
        for(i=0;i<aEle.length;i++) {
            if(re.test(aEle[i].className)) {
                aResult.push(aEle[i]);
            }
        }
        return aResult;
    }
};

ATONG.util.animate = function(obj, json, fn) {
    var getStyle = ATONG.util.getStyle;
    
    clearInterval(obj.timer);
    obj.timer=setInterval(function (){
        var bStop=true;
			
        for(var attr in json) {
            var iCur=0;
				
            if(attr=='opacity') {
                iCur=Math.round(parseFloat(getStyle(obj, attr))*100);
            }
            else {
                iCur=parseInt(getStyle(obj, attr));
            }
				
            var iSpeed=(json[attr]-iCur)/8;
            iSpeed=iSpeed>0?Math.ceil(iSpeed):Math.floor(iSpeed);
				
            if(attr=='opacity') {
                obj.style.filter='alpha(opacity:'+Math.round(iCur+iSpeed)+')';
                obj.style.opacity=Math.round(iCur+iSpeed)/100;
            }
            else {
                obj.style[attr]=iCur+iSpeed+'px';
            }
				
            if(iCur!=json[attr]) {
                bStop=false;
            }
        }
			
        if(bStop) {
            clearInterval(obj.timer);
            if(fn) {
                fn();
            }
        }
    }, 30);
};

ATONG.onDOMContentLoaded =function (onReady ) {
    var isOpera = Object.prototype.toString.call(window.opera) == '[object Opera]',
    IE = !!window.attachEvent && !isOpera;
    isReady = false,
    doReady = function () {
        if ( isReady ) return;
        isReady = true;
        onReady();
    };
    
    if ( IE ) {
        document.attachEvent("onreadystatechange", function() {
            if ( document.readyState == "complete" ) {
                document.detachEvent("onreadystatechange", arguments.callee );
                doReady();
            }
        });
        (function () {
            if ( isReady ) return;
            try {
                document.documentElement.doScroll ( 'left' );
            } catch ( e ) {
                setTimeout ( arguments.callee , 48 );
                return;
            }
            
            doReady();
        })();
    
    }
    else {
        document.addEventListener ( 'DOMContentLoaded', function () {
            document.removeEventListener('DOMContentLoaded' , arguments.callee, false );
            doReady();
        }, false );
    }
};
$_$ = ATONG.onDOMContentLoaded;

/*************工具类函数 结束****************/

/*************裁剪开始****************/

ATONG.util.ImgClip = function(options) {
    options = options || {};
    if (!options.target) {
        alert('Qin,You need to be introduced into an image object reference!');
        return;
    }
    var myAddEvent = ATONG.util.myAddEvent,
    myRemoveEvent = ATONG.util.myRemoveEvent,
    createEle = ATONG.util.createEle,
    getStyle = ATONG.util.getStyle,
    getPos = ATONG.util.getPos,
    getByClass = ATONG.util.getByClass,
    startMove = ATONG.util.animate,
    oTarget = options.target,
    toScale = options.toScale || 0,
    oParent = options.parent || document.body,
    onChange = options.onChange || function() {},
    bFade = options.fade || 0,
    minWidth = 50,
    oParentPos = null,
    oTopParent = null,
    oHandle = null,
    handleSize = null,
    imgAreaClip = createEle('div'),
    targetPos = getPos(oTarget),
    alphaImg = oTarget.cloneNode(),
    clipImg = oTarget.cloneNode(),
    selectionBox = createEle('div'),
    aI = [],
    CHROME = !!window.chrome,
    oTopMiddleHandle,
    oRightMiddleHandle,
    oBottomMiddleHandle,
    oLeftMiddleHandle,
    selection = {
        left: 0,
        top: 0,
        width: 0,
        height: 0
    },
    imgOfs = {
        left: 0,
        top: 0,
        width: 0,
        height: 0
    },
    parOfs = {
        left: 0,
        top: 0
    },
    scrollTop = function() {
        return document.body.scrollTop || document.documentElement.scrollTop;
    },
    scrollLeft = function() {
        return document.body.scrollLeft || document.documentElement.scrollLeft;
    },
    getTopParent = function(oP) {
        while (oP) {
            if (oP.parentNode == document.body) return oP;
            oP = oP.parentNode;
        }
        return false;
    };
    imgAreaClip.id = 'imgAreaClip';
    imgAreaClip.className = 'imgClip';
    imgAreaClip.style.left = targetPos.left + 'px';
    imgAreaClip.style.top = targetPos.top + 'px';
    selectionBox.id = 'selectionBox';
    selectionBox.className = 'add-cursor';
    alphaImg.id = 'alphaImg';
    clipImg.id = 'imgClip';
    for (var i = 0; i < 12; i++) {
        aI[i] = createEle('i');
        if (i < 4) {
            aI[i].className = 'custom-border';
        } else {
            aI[i].className = 'hand';
        }
        selectionBox.appendChild(aI[i]);
    }
    aI[0].className += ' border-t';
    aI[1].className += ' border-r';
    aI[2].className += ' border-b';
    aI[3].className += ' border-l';
    aI[4].className += ' rb';
    aI[5].className += ' lt';
    aI[6].className += ' lb';
    aI[7].className += ' rt';
    aI[8].className += ' tm';
    aI[9].className += ' rm';
    aI[10].className += ' bm';
    aI[11].className += ' lm';
    oTopMiddleHandle = getByClass(selectionBox, 'tm')[0];
    oRightMiddleHandle = getByClass(selectionBox, 'rm')[0];
    oBottomMiddleHandle = getByClass(selectionBox, 'bm')[0];
    oLeftMiddleHandle = getByClass(selectionBox, 'lm')[0];
    imgAreaClip.appendChild(alphaImg);
    imgAreaClip.appendChild(clipImg);
    imgAreaClip.appendChild(selectionBox);
    oParent.appendChild(imgAreaClip);
    oHandle = getByClass(selectionBox, 'hand');
    if (oParent !== document.body) {
        oTopParent = getTopParent(oParent);
        if (getStyle(oTopParent, 'position') === 'static') {
            oTopParent.style.position = 'relative';
        }
        oTopParent.style.zIndex = 99999;
    }
    oParentPos = getPos(oParent);
    parOfs.left = oParentPos.left;
    parOfs.top = oParentPos.top;
    imgOfs.left = targetPos.left;
    imgOfs.top = targetPos.top;
    imgOfs.width = oTarget.offsetWidth;
    imgOfs.height = oTarget.offsetHeight;
    handleSize = aI[7].offsetHeight;
    imgAreaClip.style.height = imgOfs.height + 'px';
    imgAreaClip.style.width = imgOfs.width + 'px';
    imgAreaClip.style.left = imgOfs.left - parOfs.left + 'px';
    imgAreaClip.style.top = imgOfs.top - parOfs.top + 'px';
    alphaImg.style.height = clipImg.style.height = imgOfs.height + 'px';
    alphaImg.style.width = clipImg.style.width = imgOfs.width + 'px';
    alphaImg.style.left = clipImg.style.left = alphaImg.style.top = clipImg.style.top = 0;
    function setStyle(obj, options) {
        for (var i in options) {
            obj.style[i] = options[i];
        }
    }
    function showOrHideHandle(name) {
        var i, l;
        for (i = 0, l = oHandle.length; i < l; i += 1) {
            setStyle(oHandle[i], name);
        }
    }
    function fnWrapDown(ev) {
        var oEvent = ev || event,
        x1, x2, y1, y2;
        x1 = oEvent.clientX - imgOfs.left + scrollLeft();
        y1 = oEvent.clientY - imgOfs.top + scrollTop();
        selection.left = x1;
        selection.top = y1;
        selectionBox.style.left = selection.left + 'px';
        selectionBox.style.top = selection.top + 'px';
        if (bFade) {
            if (!selection.width) {
                alphaImg.style.opacity = '1';
                alphaImg.style.filter = 'alpha(opacity=100)';
                startMove(alphaImg, {
                    opacity: 50
                });
            } else {
                alphaImg.style.opacity = '0.5';
                alphaImg.style.filter = 'alpha(opacity=50)';
            }
        }
        imgClip.style.clip = 'rect(0px 0px 0px 0px)';
        selection.width = selectionBox.style.width = 0;
        selection.height = selectionBox.style.height = 0;
        showOrHideHandle({
            'display': 'none'
        });
        if (imgAreaClip.setCapture) {
            myAddEvent(imgAreaClip, 'mousemove', fnWrapMove);
            myAddEvent(imgAreaClip, 'mouseup', fnWrapUp);
            imgAreaClip.setCapture();
        } else {
            myAddEvent(document, 'mousemove', fnWrapMove);
            myAddEvent(document, 'mouseup', fnWrapUp);
        }
        function fnWrapMove(ev) {
            var oEvent = ev || event;
            x2 = oEvent.clientX + scrollLeft() - imgOfs.left;
            y2 = oEvent.clientY + scrollTop() - imgOfs.top;
            toScale ? sameScale.call(imgAreaClip, x1, y1, x2, y2) : noScaleWrap(x1, y1, x2, y2);
            oTopMiddleHandle.style.left = oBottomMiddleHandle.style.left = ((selection.width - handleSize) >> 1) + 'px';
            oRightMiddleHandle.style.top = oLeftMiddleHandle.style.top = ((selection.height - handleSize) >> 1) + 'px';
            selectionBox.className = '';
            var oCustomBorder = getByClass(selectionBox, 'custom-border');
            for (var i = 0,
                l = oCustomBorder.length; i < l; i++) {
                oCustomBorder[i].style.width = selection.width + 'px';
                oCustomBorder[i].style.height = selection.height + 'px';
            }
            imgClip.style.clip = 'rect( ' + selection.top + 'px' + ' ' + (selection.left + selection.width) + 'px' + ' ' + (selection.top + selection.height) + 'px' + ' ' + selection.left + 'px' + ' )';
            onChange(selection);
        }
        function fnWrapUp() {
            selectionBox.className = 'add-cursor';
            showOrHideHandle({
                'display': 'block'
            });
            if (this.releaseCapture) {
                this.releaseCapture();
            }
            myRemoveEvent(this, 'mousemove', fnWrapMove);
            myRemoveEvent(this, 'mouseup', fnWrapUp);
            if (!selection.width && !selection.height) {
                if (bFade) {
                    startMove(alphaImg, {
                        opacity: 100
                    });
                } else {
                    imgClip.style.clip = 'rect(auto auto auto auto)';
                }
            } else {}
        } !! oEvent.preventDefault && oEvent.preventDefault();
    }
    myAddEvent(imgAreaClip, 'mousedown', fnWrapDown);
    function selectionDrag(obj) {
        myAddEvent(obj, 'mousedown', selectionDown);
        function selectionDown(ev) {
            var oEvent = ev || event;
            var disX = oEvent.clientX - obj.offsetLeft;
            var disY = oEvent.clientY - obj.offsetTop;
            if (obj.setCapture) {
                myAddEvent(obj, 'mousemove', selectionMove);
                myAddEvent(obj, 'mouseup', selectionUp);
                obj.setCapture();
            } else {
                myAddEvent(document, 'mousemove', selectionMove);
                myAddEvent(document, 'mouseup', selectionUp);
            }
            function selectionMove(ev) {
                var oEvent = ev || event;
                selection.left = oEvent.clientX - disX;
                selection.top = oEvent.clientY - disY;
                if (selection.left < 0) {
                    selection.left = 0;
                }
                if (selection.left > imgOfs.width - selection.width) {
                    selection.left = imgOfs.width - selection.width;
                }
                if (selection.top < 0) {
                    selection.top = 0;
                }
                if (selection.top > imgOfs.height - selection.height) {
                    selection.top = imgOfs.height - selection.height;
                }
                obj.style.left = selection.left + 'px';
                obj.style.top = selection.top + 'px';
                imgClip.style.clip = 'rect( ' + selection.top + 'px' + ' ' + (selection.left + selection.width) + 'px' + ' ' + (selection.top + selection.height) + 'px' + ' ' + selection.left + 'px' + ' )';
                onChange(selection);
            }
            function selectionUp() {
                if (obj.releaseCapture) {
                    obj.releaseCapture();
                }
                myRemoveEvent(this, 'mousemove', selectionMove);
                myRemoveEvent(this, 'mouseup', selectionUp);
            }
            oEvent.cancelBubble = true;
            !! oEvent.preventDefault && oEvent.preventDefault();
        }
    }
    selectionDrag(selectionBox);
    function noScaleWrap(x1, y1, x2, y2) {
        selection.width = Math.abs(x2 - x1);
        selection.height = Math.abs(y2 - y1);
        if (x1 - x2 >= 0 && y1 - y2 <= 0) {
            selection.left = x2;
            if (selection.left < 0) {
                selection.left = 0;
                selection.width = x1;
            }
            if (selection.height > imgOfs.height - selection.top) {
                selection.height = imgOfs.height - selection.top;
                selection.left = x1 - selection.width;
            }
        } else if (x1 - x2 <= 0 && y1 - y2 <= 0) {
            if (selection.width > imgOfs.width - selection.left) {
                selection.width = imgOfs.width - selection.left;
            }
            if (selection.height > imgOfs.height - selection.top) {
                selection.height = imgOfs.height - selection.top;
            }
        } else if ((x1 - x2 >= 0 && y1 - y2 >= 0)) {
            selection.left = x2;
            selection.top = y2;
            if (selection.left < 0) {
                selection.left = 0;
                selection.width = x1;
                selection.top = y1 - selection.height;
            }
            if (selection.top < 0) {
                selection.top = 0;
                selection.height = y1;
                selection.left = x1 - selection.width;
            }
        } else if ((x1 - x2 <= 0 && y1 - y2 >= 0)) {
            selection.top = y2;
            if (selection.width > imgOfs.width - selection.left) {
                selection.width = imgOfs.width - selection.left;
                selection.top = y1 - selection.height;
            }
            if (selection.top < 0) {
                selection.top = 0;
                selection.height = y1;
            }
        }
        selectionBox.style.left = selection.left + 'px';
        selectionBox.style.top = selection.top + 'px';
        selectionBox.style.width = selection.width + 'px';
        selectionBox.style.height = selection.height + 'px';
    }
    function sameScale(x1, y1, x2, y2, fixWidth, fixHeight) {
        fixWidth = fixWidth || 0;
        fixHeight = fixHeight || 0;
        if (!/tm|rm|bm|lm/.test(this.className)) {
            if (x1 - x2 >= 0 && y1 - y2 <= 0) {
                selection.left = x2;
                selection.top = y1;
                if (Math.abs(y1 - y2) > Math.abs(x1 - x2)) {
                    selection.width = selection.height = Math.abs(y1 - y2) + fixHeight;
                    selection.left = x1 - (Math.abs(y1 - y2) + fixHeight);
                } else {
                    selection.height = selection.width = Math.abs(x1 - x2) + fixWidth;
                    selection.left = x1 - (Math.abs(x1 - x2) + fixWidth);
                }
                if (selection.left < 0) {
                    selection.left = 0;
                    selection.width = selection.height = x1;
                }
                if (selection.height > imgOfs.height - selection.top) {
                    selection.height = imgOfs.height - selection.top;
                    selection.width = selection.height;
                    selection.left = x1 - selection.width;
                }
            } else if (x1 - x2 <= 0 && y1 - y2 <= 0) {
                selection.width = selection.height = Math.max(Math.abs(x1 - x2) + fixWidth, Math.abs(y1 - y2) + fixHeight);
                selection.left = x1;
                selection.top = y1;
                if (selection.width > imgOfs.width - selection.left) {
                    selection.width = imgOfs.width - selection.left;
                    selection.height = selection.width;
                }
                if (selection.height > imgOfs.height - selection.top) {
                    selection.height = imgOfs.height - selection.top;
                    selection.width = selection.height;
                }
            } else if ((x1 - x2 >= 0 && y1 - y2 >= 0)) {
                if (Math.abs(x1 - x2) > Math.abs(y1 - y2)) {
                    selection.height = selection.width = Math.abs(x1 - x2) + fixWidth;
                    selection.top = y1 - (Math.abs(x1 - x2) + fixWidth);
                    selection.left = x2 - fixWidth;
                } else {
                    selection.width = selection.height = Math.abs(y1 - y2) + fixHeight;
                    selection.top = y2 - fixHeight;
                    selection.left = x1 - (Math.abs(y1 - y2) + fixHeight);
                }
                if (selection.left < 0) {
                    selection.left = 0;
                    selection.height = selection.width = x1;
                    selection.top = y1 - selection.height;
                }
                if (selection.top < 0) {
                    selection.top = 0;
                    selection.width = selection.height = y1;
                    selection.left = x1 - selection.width;
                }
            } else if ((x1 - x2 <= 0 && y1 - y2 >= 0)) {
                selection.left = x1;
                if (Math.abs(y1 - y2) > Math.abs(x1 - x2)) {
                    selection.top = y2 - (fixHeight);
                    selection.width = selection.height = Math.abs(y2 - y1) + (fixHeight);
                } else {
                    selection.top = y1 - Math.abs(x2 - x1) - (fixWidth);
                    selection.height = selection.width = Math.abs(x2 - x1) + (fixWidth);
                }
                if (selection.width > imgOfs.width - selection.left) {
                    selection.width = imgOfs.width - selection.left;
                    selection.height = selection.width;
                    selection.top = y1 - selection.height;
                }
                if (selection.top < 0) {
                    selection.top = 0;
                    selection.width = selection.height = y1;
                }
            }
        } else {
            if (/tm/.test(this.className)) {
                if (x1 - x2 <= 0 && y1 - y2 <= 0) {
                    selection.width = selection.height = Math.abs(y1 - y2) + fixHeight;
                    selection.left = x1;
                    selection.top = y1;
                    if (selection.width > imgOfs.width - selection.left) {
                        selection.width = imgOfs.width - selection.left;
                        selection.height = selection.width;
                    }
                    if (selection.height > imgOfs.height - selection.top) {
                        selection.height = imgOfs.height - selection.top;
                        selection.width = selection.height;
                    }
                } else if ((x1 - x2 <= 0 && y1 - y2 >= 0)) {
                    selection.left = x1;
                    selection.top = (y2 - (fixHeight));
                    selection.width = selection.height = Math.abs(y2 - y1) + (fixHeight);
                    if (selection.width > imgOfs.width - selection.left) {
                        selection.width = imgOfs.width - selection.left;
                        selection.height = selection.width;
                        selection.top = y1 - selection.height;
                    }
                    if (selection.top < 0) {
                        selection.top = 0;
                        selection.width = selection.height = y1;
                    }
                }
            } else if (/rm/.test(this.className)) {
                if (x1 - x2 <= 0 && y1 - y2 <= 0) {
                    selection.width = selection.height = Math.abs(x1 - x2) + fixWidth;
                    selection.left = x1;
                    selection.top = y1;
                    if (selection.width > imgOfs.width - selection.left) {
                        selection.width = imgOfs.width - selection.left;
                        selection.height = selection.width;
                    }
                    if (selection.height > imgOfs.height - selection.top) {
                        selection.height = imgOfs.height - selection.top;
                        selection.width = selection.height;
                    }
                }
                if (x1 - x2 >= 0 && y1 - y2 <= 0) {
                    selection.left = x2;
                    selection.top = y1;
                    selection.height = selection.width = Math.abs(x1 - x2) + fixWidth;
                    selection.left = x1 - (Math.abs(x1 - x2) + fixWidth);
                    if (selection.left < 0) {
                        selection.left = 0;
                        selection.width = selection.height = x1;
                    }
                    if (selection.height > imgOfs.height - selection.top) {
                        selection.height = imgOfs.height - selection.top;
                        selection.width = selection.height;
                        selection.left = x1 - selection.width;
                    }
                }
            } else if (/bm/.test(this.className)) {
                if (x1 - x2 <= 0 && y1 - y2 <= 0) {
                    selection.width = selection.height = Math.abs(y1 - y2) + fixHeight;
                    selection.left = x1;
                    selection.top = y1;
                    if (selection.width > imgOfs.width - selection.left) {
                        selection.width = imgOfs.width - selection.left;
                        selection.height = selection.width;
                    }
                    if (selection.height > imgOfs.height - selection.top) {
                        selection.height = imgOfs.height - selection.top;
                        selection.width = selection.height;
                    }
                } else if ((x1 - x2 <= 0 && y1 - y2 >= 0)) {
                    selection.left = x1;
                    selection.top = y2 - (fixHeight);
                    selection.width = selection.height = Math.abs(y2 - y1) + fixHeight;
                    if (selection.width > imgOfs.width - selection.left) {
                        selection.width = imgOfs.width - selection.left;
                        selection.height = selection.width;
                        selection.top = y1 - selection.height;
                    }
                    if (selection.top < 0) {
                        selection.top = 0;
                        selection.width = selection.height = y1;
                    }
                }
            } else if (/lm/.test(this.className)) {
                if (x1 - x2 >= 0 && y1 - y2 <= 0) {
                    selection.left = x2;
                    selection.top = y1;
                    selection.height = selection.width = Math.abs(x1 - x2) + fixWidth;
                    selection.left = x1 - (Math.abs(x1 - x2) + fixWidth);
                    if (selection.left < 0) {
                        selection.left = 0;
                        selection.width = selection.height = x1;
                    }
                    if (selection.height > imgOfs.height - selection.top) {
                        selection.height = imgOfs.height - selection.top;
                        selection.width = selection.height;
                        selection.left = x1 - selection.width;
                    }
                } else if (x1 - x2 <= 0 && y1 - y2 <= 0) {
                    selection.width = selection.height = Math.abs(x1 - x2) + fixWidth;
                    selection.left = x1;
                    selection.top = y1;
                    if (selection.width > imgOfs.width - selection.left) {
                        selection.width = imgOfs.width - selection.left;
                        selection.height = selection.width;
                    }
                    if (selection.height > imgOfs.height - selection.top) {
                        selection.height = imgOfs.height - selection.top;
                        selection.width = selection.height;
                    }
                }
            }
        }
        selectionBox.style.top = selection.top + 'px';
        selectionBox.style.left = selection.left + 'px';
        selectionBox.style.width = selection.width + 'px';
        selectionBox.style.height = selection.height + 'px';
    }
    var handle = getByClass(selectionBox, 'hand');
    for (var i = 0,
        l = handle.length; i < l; i++) {
        handleDrag(handle[i]);
    }
    function handleDrag(obj) {
        myAddEvent(obj, 'mousedown', handleDown);
        function handleDown(ev) {
            var oEvent = ev || event,
            selectionX1, selectionX2, selectionY1, selectionY2, x1, y1, x2, y2, tempWidth, tempHeight, fixHeight, fixWidth;
            selectionX2 = selection.left + selection.width;
            selectionY2 = selection.top + selection.height;
            selectionX1 = selection.left;
            selectionY1 = selection.top;
            imgAreaClip.style.cursor = getStyle(obj, 'cursor');
            selectionBox.className = '';
            if (obj.className.indexOf('l') != -1) {
                var downClientX = oEvent.clientX;
                var downWidth = selection.width;
                var downLeft = selection.left;
            }
            if (obj.className.indexOf('r') != -1) {
                var disX = oEvent.clientX - obj.offsetLeft;
            }
            if (obj.className.indexOf('t') != -1) {
                var downClientY = oEvent.clientY;
                var downHeight = selection.height;
                var downTop = selection.top;
            }
            if (obj.className.indexOf('b') != -1) {
                var disY = oEvent.clientY - obj.offsetTop;
            }
            if (obj.className.indexOf('rb') != -1) {
                x1 = selection.left;
                y1 = selection.top;
                tempWidth = oEvent.clientX - imgOfs.left - selection.left + scrollLeft();
                tempHeight = oEvent.clientY - imgOfs.top - selection.top + scrollTop();
                fixHeight = selection.height - tempHeight;
                fixWidth = selection.width - tempWidth;
            } else if (obj.className.indexOf('lt') != -1) {
                x1 = selection.left + selection.width;
                y1 = selection.top + selection.height;
                fixHeight = oEvent.clientY - imgOfs.top - selection.top + scrollTop();
                fixWidth = (oEvent.clientX - imgOfs.left - selection.left) + scrollLeft();
            } else if (obj.className.indexOf('lb') != -1) {
                x1 = selection.left + selection.width;
                y1 = selection.top;
                fixHeight = selection.height - (oEvent.clientY + scrollTop() - imgOfs.top - selection.top);
                fixWidth = (oEvent.clientX + scrollLeft() - imgOfs.left - selection.left);
            } else if (obj.className.indexOf('rt') != -1) {
                x1 = selection.left;
                y1 = selection.top + selection.height;
                fixHeight = oEvent.clientY + scrollTop() - imgOfs.top - selection.top;
                fixWidth = selection.width - (oEvent.clientX + scrollLeft() - imgOfs.left - selection.left);
            } else if (obj.className.indexOf('tm') != -1) {
                x1 = selection.left;
                y1 = selection.top + selection.height;
                fixWidth = selection.width - (oEvent.clientX + scrollLeft() - imgOfs.left - selection.left);
                fixHeight = oEvent.clientY + scrollTop() - imgOfs.top - selection.top;
            } else if (obj.className.indexOf('rm') != -1 || obj.className.indexOf('bm') != -1) {
                x1 = selection.left;
                y1 = selection.top;
                fixWidth = selection.width - (oEvent.clientX + scrollLeft() - imgOfs.left - selection.left);
                fixHeight = selection.height - (oEvent.clientY + scrollTop() - imgOfs.top - selection.top);
            } else if (obj.className.indexOf('lm') != -1) {
                x1 = selection.left + selection.width;
                y1 = selection.top;
                fixWidth = oEvent.clientX - imgOfs.left - selection.left + scrollLeft();
                fixHeight = selection.height - (oEvent.clientY + scrollTop() - imgOfs.top - selection.top);
            }
            if (obj.setCapture) {
                obj.setCapture();
                myAddEvent(obj, 'mousemove', fnHandleMove);
                myAddEvent(obj, 'mouseup', fnHandleUp);
            } else {
                myAddEvent(document, 'mousemove', fnHandleMove);
                myAddEvent(document, 'mouseup', fnHandleUp);
            }
            function fnHandleMove(ev) {
                var oEvent = ev || event;
                x2 = oEvent.clientX - imgOfs.left + scrollLeft();
                y2 = oEvent.clientY - imgOfs.top + scrollTop();
                function noScaleHandle(nClientX, nClientY, handleX1, selectionY1, selectionX2, selectionY2) {
                    if (obj.className.indexOf('l') != -1) {
                        var _disX = nClientX - downClientX;
                        selection.left = downLeft + _disX;
                        selection.width = downWidth - _disX;
                        if (selection.left <= 0) {
                            selection.left = 0;
                            selection.width = selectionX2;
                        }
                        if (selection.width <= 0) {
                            selection.width = Math.abs(selection.width);
                            selection.left = selectionX2;
                        }
                        if (selection.width > imgOfs.width - selection.left) {
                            selection.width = imgOfs.width - selection.left;
                        }
                        selectionBox.style.width = selection.width + 'px';
                        selectionBox.style.left = selection.left + 'px';
                    }
                    if (obj.className.indexOf('r') != -1) {
                        selection.width = nClientX - disX + obj.offsetWidth;
                        selection.left = selectionX1;
                        if (selection.width > imgOfs.width - selection.left) {
                            selection.width = imgOfs.width - selection.left;
                        }
                        if (selection.width <= 0) {
                            selection.width = Math.abs(selection.width);
                            selection.left = selectionX1 - selection.width;
                        }
                        if (selection.left <= 0) {
                            selection.left = 0;
                            selection.width = selectionX1;
                        }
                        selectionBox.style.width = selection.width + 'px';
                        selectionBox.style.left = selection.left + 'px';
                    }
                    if (obj.className.indexOf('t') != -1) {
                        var _disY = nClientY - downClientY;
                        selection.height = downHeight - _disY;
                        selection.top = downTop + _disY;
                        if (selection.top <= 0) {
                            selection.top = 0;
                            selection.height = selectionY2;
                        }
                        if (selection.height <= 0) {
                            selection.height = Math.abs(selection.height);
                            selection.top = selectionY2;
                        }
                        if (selection.height > imgOfs.height - selection.top) {
                            selection.height = imgOfs.height - selection.top;
                        }
                        selectionBox.style.top = selection.top + 'px';
                        selectionBox.style.height = selection.height + 'px';
                    }
                    if (obj.className.indexOf('b') != -1) {
                        selection.height = nClientY - disY + obj.offsetHeight;
                        selection.top = selectionY1;
                        if (selection.height > imgOfs.height - selection.top) {
                            selection.height = imgOfs.height - selection.top;
                        }
                        if (selection.height <= 0) {
                            selection.height = Math.abs(selection.height);
                            selection.top = selectionY1 - selection.height;
                        }
                        if (selection.top <= 0) {
                            selection.top = 0;
                            selection.height = selectionY1;
                        }
                        selectionBox.style.height = selection.height + 'px';
                        selectionBox.style.top = selection.top + 'px';
                    }
                }
                toScale ? sameScale.call(obj, x1, y1, x2, y2, fixWidth, fixHeight) : noScaleHandle(oEvent.clientX, oEvent.clientY, selectionX1, selectionY1, selectionX2, selectionY2);
                oTopMiddleHandle.style.left = oBottomMiddleHandle.style.left = ((selection.width - handleSize) >> 1) + 'px';
                oRightMiddleHandle.style.top = oLeftMiddleHandle.style.top = ((selection.height - handleSize) >> 1) + 'px';
                var oCustomBorder = getByClass(selectionBox, 'custom-border');
                for (var i = 0,
                    l = oCustomBorder.length; i < l; i++) {
                    oCustomBorder[i].style.width = selection.width + 'px';
                    oCustomBorder[i].style.height = selection.height + 'px';
                }
                imgClip.style.clip = 'rect( ' + selection.top + 'px' + ' ' + (selection.left + selection.width) + 'px' + ' ' + (selection.top + selection.height) + 'px' + ' ' + selection.left + 'px' + ' )';
                onChange(selection);
                oEvent.cancelBubble = true;
            }
            function fnHandleUp() {
                selectionBox.className = 'add-cursor';
                imgAreaClip.style.cursor = 'crosshair';
                if (obj.releaseCapture) {
                    obj.releaseCapture();
                }
                myRemoveEvent(this, 'mousemove', fnHandleMove);
                myRemoveEvent(this, 'mouseup', fnHandleUp);
            }
            oEvent.cancelBubble = true;
            !! oEvent.preventDefault && oEvent.preventDefault();
        }
    }
};
/*************裁剪结束****************/
(function() {
    var added = false, oL,oHead;
    if (added == true) {
        return;
    }
    added = true;
    oL = document.createElement('link');
    oL.rel = 'stylesheet';
    oL.type = 'text/css';
    oL.href = 'imgSelectionClip.css';
    oHead = document.getElementsByTagName('head')[0];
    oHead.appendChild(oL);
})();