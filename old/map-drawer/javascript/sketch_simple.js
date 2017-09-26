//
//配列クラスのスライスを参照
var __slice = Array.prototype.slice;
//jquery
//(function($) {})(jQuery);の記述
//最初の()は無名関数としてコードを外部と分離して使うため
//$はふたつめの()のjQueryが代入される
//ふたつめの()の中身はその関数へのhandle
//詳しくはココ http://d.hatena.ne.jp/initialize/20090526/p1
//さらに解説 http://blog.livedoor.jp/eeu/archives/55310188.html
//(function(){})()はfunction(){}で宣言した無名関数をいきなり実行する
$(function() {

	// -- Sketchクラス --
  	//elはcanvas要素を想定 optsはオプションだがまだ謎
    function Sketch(el, opts) {
    	//-- canvasのコンテキストを取得 --
		this.el = el;
		this.canvas = $(el);
		this.context = el.getContext('2d');
		//-- オプションの値をoptsから設定,ない場合はデフォルト値となる --
		//$.extendによりjQuery名前空間に新たなメソッドを追加する
		this.options = $.extend(
			{
				toolLinks: true,
				defaultTool: 'marker',
				defaultColor: '#000000',
				defaultSize: 5
			}, 
			opts
		);
		//--ここまで オプションの値をoptsから設定,ない場合はデフォルト値となる --
		
		//paitingフラグをfalseにする
		this.painting = false;
		//optionsの値をそれぞれのパラメータに代入
		this.tool = this.options.defaultTool;
		this.size = this.options.defaultSize;
		this.color = this.options.defaultColor;
		
		//下のactionの値がpushされていく
		this.actions = [];
		//動作を保存
		this.action = [];
		
		//コールバック関数の紐付け 複数のイベントに対してthis.onEventを紐付ける
		this.canvas.bind('click mousedown mouseup mousemove mouseleave mouseout touchstart touchmove touchend touchcancel', this.onEvent);
		//toolLinksがtrue
		if (this.options.toolLinks) {
			//--bodyタグ内のa[href=キャンバスのid]に対してclick関数を定義する--
			$('body').delegate(
				"a[href=\"#" + (this.canvas.attr('id')) + "\"]", 
				'click', 
				function(e) {
					var $canvas, $this, key, sketch, _i, _len, _ref;
					$this = $(this);
					$canvas = $($this.attr('href'));
					sketch = $canvas.data('sketch');
					_ref = ['color', 'size', 'tool'];
					for (_i = 0, _len = _ref.length; _i < _len; _i++) {
						key = _ref[_i];
						if ($this.attr("data-" + key)) {
						  sketch.set(key, $(this).attr("data-" + key));
						}
					}
					if ($(this).attr('data-download')) {
						sketch.download($(this).attr('data-download'));
					}
					return false;
				}
			);
			//--ここまで bodyタグ内のa[href=キャンバスのid]に対してclick関数を定義する--
		}//if (this.options.toolLinks) {
	}
	//-----ここまで コンストラクタ-----
		
	//プロトタイプのdownloadを定義
	Sketch.prototype.download = function(format) {
		var mime;
		format || (format = "png");
		if (format === "jpg") {
			format = "jpeg";
		}
		mime = "image/" + format;
		return window.open(this.el.toDataURL(mime));
	};
	
	//プロトタイプのsetを定義
	Sketch.prototype.set = function(key, value) {
		this[key] = value;
		return this.canvas.trigger("sketch.change" + key, value);
	};
	
	//プロトタイプのstartPaintingを定義
	//actionプロパティに値が代入されたものが返される
	Sketch.prototype.startPainting = function() {
		this.painting = true;
		return this.action = {
			tool: this.tool,
			color: this.color,
			size: parseFloat(this.size),
			events: []
		};
	};
	
	//プロトタイプのstopPaintingを定義
	//actionプロパティの値をactionsに代入した後nullを入れる
	Sketch.prototype.stopPainting = function() {
//		if (this.action) {
//			this.actions.push(this.action);
//		}
		this.actions = [];
		this.painting = false;
		this.action = null;
		return this.redraw();
	};
	
	//プロトタイプのonEventを定義   
	Sketch.prototype.onEvent = function(e) {
		if (e.originalEvent && e.originalEvent.targetTouches) {
			e.pageX = e.originalEvent.targetTouches[0].pageX;
			e.pageY = e.originalEvent.targetTouches[0].pageY;
		}
		//$(this).data('sketch').toolの文字列から$.sketch.tools内の要素を取り出しそのonEventをcallで実行する
		//call呼び出しなので$(this).data('sketch')が関数内のthis参照となる
		$.sketch.tools[$(this).data('sketch').tool].onEvent.call($(this).data('sketch'), e);
		e.preventDefault();
		return false;
	};
	
	//-- プロトタイプのredrawを定義 --
	Sketch.prototype.redraw = function() {
		var sketch;
//		this.el.width = this.canvas.width();
		this.context = this.el.getContext('2d');
		sketch = this;
		//actionsに設定されている
		$.each(
			this.actions, 
			function() {
				if (this.tool) {
					return $.sketch.tools[this.tool].draw.call(sketch, this);
				}
			}
		);
		if (this.painting && this.action) {
			return $.sketch.tools[this.action.tool].draw.call(sketch, this.action);
		}
	};
	//--ここまで プロトタイプのredrawを定義 --
   
	//sketch関数の独自追加
	$.fn.sketch = function() {
		var args, key, sketch;
		//argumentsオブジェクト(特殊なオブジェクト)関数が呼び出されたタイミングで内部的にargumentsオブジェクトが生成され、呼び出し元から渡された変数を格納する
		//引数の最初の変数をkeyにしてそれ以降をargsに代入,引数が2より小さい場合はargsは空になる
		key = arguments[0];
		args = (2 <= arguments.length) ? __slice.call(arguments, 1) : [];
		//たぶんクラスのインスタンスがひとつだけじゃないとダメという処理
		if (this.length > 1) {
	  		$.error('Sketch.js can only be called on one element at a time.');
		}
		// --sketch名で保存したデータを取得しkeyの値との&&をとって場合分け --
		sketch = this.data('sketch');
		if (typeof key === 'string' && sketch) {//keyのタイプが文字列かつsketchに値がある
			if (sketch[key]) {
				//keyのが関数ならargsを引数にして実行
				if (typeof sketch[key] === 'function') {
					return sketch[key].apply(sketch, args);
				} 
				else if (args.length === 0) {
					return sketch[key];
				} 
				else if (args.length === 1) {
					return sketch[key] = args[0];
				}
			} 
			else {
				return $.error('Sketch.js did not recognize the given command.');
			}
			} else if (sketch) {//keyの型が文字列ではないがsketchに値がある
			return sketch;
		} 
		else {//keyの型が文字列ではないしsketchに値もない
			//スケッチのインスタンスを生成しsketch名としてデータに保存する
			//canvasのエレメントとkeyを引数にする keyはオプションらしいがまだよく分かってない
			this.data('sketch', new Sketch(this.get(0), key));
			return this;
		}
	};
		
	$.sketch = {
		tools: {
			marker : {
				//--onEventをキーにメソッドを定義--
				onEvent: function(e) {
					//イベントタイプにより処理を分岐
					switch (e.type) {
					case 'mousedown':
					case 'touchstart': //押されたら
						this.startPainting();
					break;
					case 'mouseup':
					case 'mouseout':
					case 'mouseleave':
					case 'touchend':
					case 'touchcancel': //離れたら
						this.stopPainting();
					}
					//paintingフラグがたっていたら
					if (this.painting) {
						//action.eventsにマウス座標をプッシュ
						this.action.events.push({
							x: e.pageX - this.canvas.offset().left,
							y: e.pageY - this.canvas.offset().top,
							event: e.type
						});
						//redrawメソッドを呼び出し
						return this.redraw();
					}
				},//--ここまで onEventをキーにメソッドを定義--
			
				///drawをキーにメソッドを定義
				draw: function(action) {
					var event, previous, _i, _len, _ref;
					this.context.lineJoin = "round";
					this.context.lineCap = "round";
					this.context.beginPath();
					this.context.moveTo(action.events[0].x, action.events[0].y);
					_ref = action.events;
					for (_i = 0, _len = _ref.length; _i < _len; _i++) {
						event = _ref[_i];
						this.context.lineTo(event.x, event.y);
						previous = event;
					}
					this.context.strokeStyle = action.color;
					this.context.lineWidth = action.size;
					return this.context.stroke();
				}
			},
			
			eraser : {
				//onEventのメソッドの定義
				onEvent: function(e) {
					return $.sketch.tools.marker.onEvent.call(this, e);
				},
				//drawメソッドの定義
				draw: function(action) {
					var oldcomposite;
					oldcomposite = this.context.globalCompositeOperation;
					this.context.globalCompositeOperation = "copy";
					action.color = "rgba(0,0,0,0)";
					$.sketch.tools.marker.draw.call(this, action);
					return this.context.globalCompositeOperation = oldcomposite;
				}
			}
		}
	};
});