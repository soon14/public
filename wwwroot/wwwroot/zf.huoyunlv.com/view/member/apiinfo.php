<?php require_once 'header.php'; ?>


  <div style="padding:10px" class="layui-body site-demo" lay-filter="demoTitle">

	<div class="layui-row layui-col-space10">
		<div class="layui-col-xs12 layui-col-md12">

			<div class="biankuang"> 
				<span class="layui-breadcrumb">
				  <a href="/member">商户首页</a>
				  <a><cite>密钥管理</cite></a>
				</span>
			</div>
		
		</div>
	</div>


	<div class="layui-row layui-col-space15">

		<div class="layui-col-xs12 layui-col-md6">
		  <div class="shuzi5 kuang">

			<div class="title">商户编号</div>
			<div class="widget-statistic-value">
                               <?php echo $_SESSION[ 'login_userid']?>
            </div>
		  </div>
		</div>


		<div class="layui-col-xs12 layui-col-md6">
		  <div class="shuzi6 kuang">

			<div class="title">接入密钥</div>
			<div class="miyaoa">

                               <?php 
									
									
									if (isset($_SESSION['login_apikey'])){
										echo $_SESSION['login_apikey'];
									}else{
									
										echo "未开通";
									
									}
									
									
									
									?>
            </div>
		  </div>
		</div>		

	  </div>


	<div style="margin-top:20px" class="layui-row">
		<div class="layui-col-xs12 layui-col-md12">

			<div class="biankuang"> 
				<div class="titletd">接口DEMO</div>
				<hr>
				<div style="padding-bottom:20px;padding-top:10px" class="layui-row layui-col-space15">

					
					<div class="layui-col-xs12 layui-col-md2">
						<a href="/upload/API.zip" class="layui-btn layui-btn-primary bi"> DEMO示例</a>
					</div>

					<div class="layui-col-xs12 layui-col-md2">
						<a href="/upload/api.pdf" class="layui-btn layui-btn-primary bi"> API说明.pdf</a>
					</div>

					<div class="layui-col-xs12 layui-col-md2">
						<a href="/upload/api.doc" class="layui-btn layui-btn-primary bi"> API说明.doc</a>
					</div>

				</div>
			</div>

			
		
		</div>
	</div>


	<div style="margin-top:20px" class="layui-row">
		<div class="layui-col-xs12 layui-col-md12">

			<div class="biankuang"> 
				<div class="titletd">接口API</div>
				<hr>
				<div style="padding-bottom:20px;padding-top:10px" class="layui-row layui-col-space15">

					

<!doctype html><html><head>
<meta charset="utf-8">
<title>Markdoc Preview</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">/*! normalize.css v3.0.1 | MIT License | git.io/normalize */

/**
 * 1. Set default font family to sans-serif.
 * 2. Prevent iOS text size adjust after orientation change, without disabling
 *    user zoom.
 */

html {
  font-family: sans-serif; /* 1 */
  -ms-text-size-adjust: 100%; /* 2 */
  -webkit-text-size-adjust: 100%; /* 2 */
}

/**
 * Remove default margin.
 */

body {
  margin: 0;
}

/* HTML5 display definitions
   ========================================================================== */

/**
 * Correct `block` display not defined for any HTML5 element in IE 8/9.
 * Correct `block` display not defined for `details` or `summary` in IE 10/11 and Firefox.
 * Correct `block` display not defined for `main` in IE 11.
 */

article,
aside,
details,
figcaption,
figure,
footer,
header,
hgroup,
main,
nav,
section,
summary {
  display: block;
}

/**
 * 1. Correct `inline-block` display not defined in IE 8/9.
 * 2. Normalize vertical alignment of `progress` in Chrome, Firefox, and Opera.
 */

audio,
canvas,
progress,
video {
  display: inline-block; /* 1 */
  vertical-align: baseline; /* 2 */
}

/**
 * Prevent modern browsers from displaying `audio` without controls.
 * Remove excess height in iOS 5 devices.
 */

audio:not([controls]) {
  display: none;
  height: 0;
}

/**
 * Address `[hidden]` styling not present in IE 8/9/10.
 * Hide the `template` element in IE 8/9/11, Safari, and Firefox < 22.
 */

[hidden],
template {
  display: none;
}

/* Links
   ========================================================================== */

/**
 * Remove the gray background color from active links in IE 10.
 */

a {
  background: transparent;
}

/**
 * Improve readability when focused and also mouse hovered in all browsers.
 */

a:active,
a:hover {
  outline: 0;
}

/* Text-level semantics
   ========================================================================== */

/**
 * Address styling not present in IE 8/9/10/11, Safari, and Chrome.
 */

abbr[title] {
  border-bottom: 1px dotted;
}

/**
 * Address style set to `bolder` in Firefox 4+, Safari, and Chrome.
 */

b,
strong {
  font-weight: bold;
}

/**
 * Address styling not present in Safari and Chrome.
 */

dfn {
  font-style: italic;
}

/**
 * Address variable `h1` font-size and margin within `section` and `article`
 * contexts in Firefox 4+, Safari, and Chrome.
 */

h1 {
  font-size: 2em;
  margin: 0.67em 0;
}

/**
 * Address styling not present in IE 8/9.
 */

mark {
  background: #ff0;
  color: #000;
}

/**
 * Address inconsistent and variable font size in all browsers.
 */

small {
  font-size: 80%;
}

/**
 * Prevent `sub` and `sup` affecting `line-height` in all browsers.
 */

sub,
sup {
  font-size: 75%;
  line-height: 0;
  position: relative;
  vertical-align: baseline;
}

sup {
  top: -0.5em;
}

sub {
  bottom: -0.25em;
}

/* Embedded content
   ========================================================================== */

/**
 * Remove border when inside `a` element in IE 8/9/10.
 */

img {
  border: 0;
}

/**
 * Correct overflow not hidden in IE 9/10/11.
 */

svg:not(:root) {
  overflow: hidden;
}

/* Grouping content
   ========================================================================== */

/**
 * Address margin not present in IE 8/9 and Safari.
 */

figure {
  margin: 1em 40px;
}

/**
 * Address differences between Firefox and other browsers.
 */

hr {
  -moz-box-sizing: content-box;
  box-sizing: content-box;
  height: 0;
}

/**
 * Contain overflow in all browsers.
 */

pre {
  overflow: auto;
}

/**
 * Address odd `em`-unit font size rendering in all browsers.
 */

code,
kbd,
pre,
samp {
  font-family: monospace, monospace;
  font-size: 1em;
}

/* Forms
   ========================================================================== */

/**
 * Known limitation: by default, Chrome and Safari on OS X allow very limited
 * styling of `select`, unless a `border` property is set.
 */

/**
 * 1. Correct color not being inherited.
 *    Known issue: affects color of disabled elements.
 * 2. Correct font properties not being inherited.
 * 3. Address margins set differently in Firefox 4+, Safari, and Chrome.
 */

button,
input,
optgroup,
select,
textarea {
  color: inherit; /* 1 */
  font: inherit; /* 2 */
  margin: 0; /* 3 */
}

/**
 * Address `overflow` set to `hidden` in IE 8/9/10/11.
 */

button {
  overflow: visible;
}

/**
 * Address inconsistent `text-transform` inheritance for `button` and `select`.
 * All other form control elements do not inherit `text-transform` values.
 * Correct `button` style inheritance in Firefox, IE 8/9/10/11, and Opera.
 * Correct `select` style inheritance in Firefox.
 */

button,
select {
  text-transform: none;
}

/**
 * 1. Avoid the WebKit bug in Android 4.0.* where (2) destroys native `audio`
 *    and `video` controls.
 * 2. Correct inability to style clickable `input` types in iOS.
 * 3. Improve usability and consistency of cursor style between image-type
 *    `input` and others.
 */

button,
html input[type="button"], /* 1 */
input[type="reset"],
input[type="submit"] {
  -webkit-appearance: button; /* 2 */
  cursor: pointer; /* 3 */
}

/**
 * Re-set default cursor for disabled elements.
 */

button[disabled],
html input[disabled] {
  cursor: default;
}

/**
 * Remove inner padding and border in Firefox 4+.
 */

button::-moz-focus-inner,
input::-moz-focus-inner {
  border: 0;
  padding: 0;
}

/**
 * Address Firefox 4+ setting `line-height` on `input` using `!important` in
 * the UA stylesheet.
 */

input {
  line-height: normal;
}

/**
 * It's recommended that you don't attempt to style these elements.
 * Firefox's implementation doesn't respect box-sizing, padding, or width.
 *
 * 1. Address box sizing set to `content-box` in IE 8/9/10.
 * 2. Remove excess padding in IE 8/9/10.
 */

input[type="checkbox"],
input[type="radio"] {
  box-sizing: border-box; /* 1 */
  padding: 0; /* 2 */
}

/**
 * Fix the cursor style for Chrome's increment/decrement buttons. For certain
 * `font-size` values of the `input`, it causes the cursor style of the
 * decrement button to change from `default` to `text`.
 */

input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
  height: auto;
}

/**
 * 1. Address `appearance` set to `searchfield` in Safari and Chrome.
 * 2. Address `box-sizing` set to `border-box` in Safari and Chrome
 *    (include `-moz` to future-proof).
 */

input[type="search"] {
  -webkit-appearance: textfield; /* 1 */
  -moz-box-sizing: content-box;
  -webkit-box-sizing: content-box; /* 2 */
  box-sizing: content-box;
}

/**
 * Remove inner padding and search cancel button in Safari and Chrome on OS X.
 * Safari (but not Chrome) clips the cancel button when the search input has
 * padding (and `textfield` appearance).
 */

input[type="search"]::-webkit-search-cancel-button,
input[type="search"]::-webkit-search-decoration {
  -webkit-appearance: none;
}

/**
 * Define consistent border, margin, and padding.
 */

fieldset {
  border: 1px solid #c0c0c0;
  margin: 0 2px;
  padding: 0.35em 0.625em 0.75em;
}

/**
 * 1. Correct `color` not being inherited in IE 8/9/10/11.
 * 2. Remove padding so people aren't caught out if they zero out fieldsets.
 */

legend {
  border: 0; /* 1 */
  padding: 0; /* 2 */
}

/**
 * Remove default vertical scrollbar in IE 8/9/10/11.
 */

textarea {
  overflow: auto;
}

/**
 * Don't inherit the `font-weight` (applied by a rule above).
 * NOTE: the default cannot safely be changed in Chrome and Safari on OS X.
 */

optgroup {
  font-weight: bold;
}

/* Tables
   ========================================================================== */

/**
 * Remove most spacing between table cells.
 */

table {
  border-collapse: collapse;
  border-spacing: 0;
}

td,
th {
  padding: 0;
}

/* mscore */
* {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
*:before,
*:after {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
html {
  font-size: 62.5%;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}
body {
  /*font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;*/
  font-family: 'Helvetica Neue', Helvetica, Arial, 'Microsoft Yahei', sans-serif;
  font-size: 14px;
  line-height: 1.42857143;
  color: #333333;
  background-color: #ffffff;
}
input,
button,
select,
textarea {
  font-family: inherit;
  font-size: inherit;
  line-height: inherit;
}
a {
  color: #428bca;
  text-decoration: none;
}
a:hover,
a:focus {
  color: #2a6496;
  text-decoration: underline;
}
a:focus {
  outline: thin dotted;
  outline: 5px auto -webkit-focus-ring-color;
  outline-offset: -2px;
}
figure {
  margin: 0;
}
img {
  vertical-align: middle;
}

/*
Original style from softwaremaniacs.org (c) Ivan Sagalaev <Maniac@SoftwareManiacs.Org>
*/

.hljs {
  display: block;
  overflow-x: auto;
  padding: 0.5em;
  background: #f0f0f0;
  -webkit-text-size-adjust: none;
}

.hljs,
.hljs-subst,
.hljs-tag .hljs-title,
.nginx .hljs-title {
  color: black;
}

.hljs-string,
.hljs-title,
.hljs-constant,
.hljs-parent,
.hljs-tag .hljs-value,
.hljs-rules .hljs-value,
.hljs-preprocessor,
.hljs-pragma,
.haml .hljs-symbol,
.ruby .hljs-symbol,
.ruby .hljs-symbol .hljs-string,
.hljs-template_tag,
.django .hljs-variable,
.smalltalk .hljs-class,
.hljs-addition,
.hljs-flow,
.hljs-stream,
.bash .hljs-variable,
.apache .hljs-tag,
.apache .hljs-cbracket,
.tex .hljs-command,
.tex .hljs-special,
.erlang_repl .hljs-function_or_atom,
.asciidoc .hljs-header,
.markdown .hljs-header,
.coffeescript .hljs-attribute {
  color: #800;
}

.smartquote,
.hljs-comment,
.hljs-annotation,
.diff .hljs-header,
.hljs-chunk,
.asciidoc .hljs-blockquote,
.markdown .hljs-blockquote {
  color: #888;
}

.hljs-number,
.hljs-date,
.hljs-regexp,
.hljs-literal,
.hljs-hexcolor,
.smalltalk .hljs-symbol,
.smalltalk .hljs-char,
.go .hljs-constant,
.hljs-change,
.lasso .hljs-variable,
.makefile .hljs-variable,
.asciidoc .hljs-bullet,
.markdown .hljs-bullet,
.asciidoc .hljs-link_url,
.markdown .hljs-link_url {
  color: #080;
}

.hljs-label,
.hljs-javadoc,
.ruby .hljs-string,
.hljs-decorator,
.hljs-filter .hljs-argument,
.hljs-localvars,
.hljs-array,
.hljs-attr_selector,
.hljs-important,
.hljs-pseudo,
.hljs-pi,
.haml .hljs-bullet,
.hljs-doctype,
.hljs-deletion,
.hljs-envvar,
.hljs-shebang,
.apache .hljs-sqbracket,
.nginx .hljs-built_in,
.tex .hljs-formula,
.erlang_repl .hljs-reserved,
.hljs-prompt,
.asciidoc .hljs-link_label,
.markdown .hljs-link_label,
.vhdl .hljs-attribute,
.clojure .hljs-attribute,
.asciidoc .hljs-attribute,
.lasso .hljs-attribute,
.coffeescript .hljs-property,
.hljs-phony {
  color: #88f;
}

.hljs-keyword,
.hljs-id,
.hljs-title,
.hljs-built_in,
.css .hljs-tag,
.hljs-javadoctag,
.hljs-phpdoc,
.hljs-dartdoc,
.hljs-yardoctag,
.smalltalk .hljs-class,
.hljs-winutils,
.bash .hljs-variable,
.apache .hljs-tag,
.hljs-type,
.hljs-typename,
.tex .hljs-command,
.asciidoc .hljs-strong,
.markdown .hljs-strong,
.hljs-request,
.hljs-status {
  font-weight: bold;
}

.asciidoc .hljs-emphasis,
.markdown .hljs-emphasis {
  font-style: italic;
}

.nginx .hljs-built_in {
  font-weight: normal;
}

.coffeescript .javascript,
.javascript .xml,
.lasso .markup,
.tex .hljs-formula,
.xml .javascript,
.xml .vbscript,
.xml .css,
.xml .hljs-cdata {
  opacity: 0.5;
}
#container {
  padding: 15px;
  margin-left:20px;
}
pre {
  border: 1px solid #ccc;
  border-radius: 4px;
  display: block;
}
pre code {
  white-space: pre-wrap;
}
.hljs,
code {
  font-family: Monaco, Menlo, Consolas, 'Courier New', monospace;
}

pre{
  background-color: #dddddd;
  padding:8px 0px 8px 30px;
  word-wrap: break-word;
}
table tbody tr:nth-child(2n) {
    background: rgba(158,188,226,0.12); 
}
:not(pre) > code {
  padding: 2px 4px;
  font-size: 90%;
  color: #c7254e;
  background-color: #f9f2f4;
  white-space: nowrap;
  border-radius: 4px;
}
th, td {
  border: 1px solid #ccc;
  padding: 6px 12px;
}
blockquote {
    border-left-width: 10px;
    background-color: rgba(102,128,153,0.05);
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
    padding: 1px 20px
}
blockquote.pull-right small:before,blockquote.pull-right .small:before {
    content: ''
}

blockquote.pull-right small:after,blockquote.pull-right .small:after {
    content: '\00A0 \2014'
}

blockquote:before,blockquote:after {
    content: ""
}
blockquote {
    margin: 0 0 1.1em
}
blockquote p {
    margin-bottom: 1.1em;
    font-size: 1em;
    line-height: 1.45
}

blockquote ul:last-child,blockquote ol:last-child {
    margin-bottom: 0
}
blockquote {
    margin: 0 0 21px;
    border-left: 10px solid #dddddd;
}</style><style>@font-face{font-family:uc-nexus-iconfont;src:url(chrome-extension://pogijhnlcfmcppgimcaccdkmbedjkmhi/res/font_9qmmi8b8jsxxbt9.woff) format('woff'),url(chrome-extension://pogijhnlcfmcppgimcaccdkmbedjkmhi/res/font_9qmmi8b8jsxxbt9.ttf) format('truetype')}</style></head>
<body marginwidth="0" marginheight="0">
<div id="container"><h1 id="-">中付宝接口文档</h1>
<h2 id="http-www-com-"><a href="http://www.域名.com/">http://www.域名.com/</a></h2>
<h2 id="-">测试账户</h2>
<table>
<thead>
<tr>
<th>参数</th>
<th style="text-align:center">说明</th>
<th style="text-align:center">测试账户</th>
</tr>
</thead>
<tbody>
<tr>
<td>customerid</td>
<td style="text-align:center">商户号</td>
<td style="text-align:center">10886</td>
</tr>
<tr>
<td>KEY</td>
<td style="text-align:center">商户秘钥</td>
<td style="text-align:center">1b5745912dd5295f1be2631e0a9b8ed6017ddde1</td>
</tr>
</tbody>
</table>
<h2 id="-">创建支付订单</h2>
<h3 id="1-">1 请求地址</h3>
<blockquote>
<p><a href="http://域名/apisubmit">http://域名/apisubmit</a></p>
</blockquote>
<h3 id="2-http-post-get">2 请求方式：HTTP post / get</h3>
<h3 id="4-">4 请求参数:</h3>
<table>
<thead>
<tr>
<th>字段名称</th>
<th style="text-align:center">字段说明</th>
<th style="text-align:center">类型</th>
<th style="text-align:center">必填</th>
<th style="text-align:right">备注</th>
</tr>
</thead>
<tbody>
<tr>
<td>version</td>
<td style="text-align:center">版本号</td>
<td style="text-align:center">string</td>
<td style="text-align:center">Y</td>
<td style="text-align:right">固定值 1.0</td>
</tr>
<tr>
<td>customerid</td>
<td style="text-align:center">商户号</td>
<td style="text-align:center">int</td>
<td style="text-align:center">Y</td>
<td style="text-align:right">例:10000</td>
</tr>
<tr>
<td>sdorderno</td>
<td style="text-align:center">商户订单号不超过30</td>
<td style="text-align:center">string</td>
<td style="text-align:center">Y</td>
<td style="text-align:right">201758985234234234</td>
</tr>
<tr>
<td>total_fee</td>
<td style="text-align:center">付款金额</td>
<td style="text-align:center">float</td>
<td style="text-align:center">Y</td>
<td style="text-align:right">1.00</td>
</tr>
<tr>
<td>paytype</td>
<td style="text-align:center">支付类型</td>
<td style="text-align:center">string</td>
<td style="text-align:center">Y</td>
<td style="text-align:right">详细看附录1</td>
</tr>
<tr>
<td>bankcode</td>
<td style="text-align:center">银行编号</td>
<td style="text-align:center">string</td>
<td style="text-align:center">Y</td>
<td style="text-align:right">网银直连不可为空，其他支付方式可为空详见附录2</td>
</tr>
<tr>
<td>notifyurl</td>
<td style="text-align:center">异步通知</td>
<td style="text-align:center">string</td>
<td style="text-align:center">Y</td>
<td style="text-align:right">服务器通知</td>
</tr>
<tr>
<td>returnurl</td>
<td style="text-align:center">同步</td>
<td style="text-align:center">string</td>
<td style="text-align:center">Y</td>
<td style="text-align:right">浏览器跳转</td>
</tr>
<tr>
<td>remark</td>
<td style="text-align:center">附加参数</td>
<td style="text-align:center">string</td>
<td style="text-align:center">N</td>
<td style="text-align:right">按参数返回 不可超过30字</td>
</tr>
<tr>
<td>sign</td>
<td style="text-align:center">加密字符</td>
<td style="text-align:center">string</td>
<td style="text-align:center">Y</td>
<td style="text-align:right">MD5加密 看下面5加密方法</td>
</tr>
</tbody>
</table>
<h3 id="5-md5-">5 MD5加密方法:</h3>
<p>{value}要替换成接收到的值，{apikey}要替换成平台分配的接入密钥，可在商户后台获取</p>
<pre><code>version={<span class="hljs-keyword">value</span>}&amp;customerid={<span class="hljs-keyword">value</span>}&amp;total_fee={<span class="hljs-keyword">value</span>}&amp;sdorderno={<span class="hljs-keyword">value</span>}&amp;notifyurl={<span class="hljs-keyword">value</span>}&amp;returnurl={<span class="hljs-keyword">value</span>}&amp;apikey
</code></pre><p>使用md5签名上面拼接的字符串即可生成小写的32位密文</p>
<h4 id="md5-">MD5加密实例:</h4>
<pre><code>version=<span class="hljs-number">1.0</span>&amp;customerid=<span class="hljs-number">10886</span>&amp;total_fee=<span class="hljs-number">1.00</span>&amp;sdorderno=<span class="hljs-number">201715451541212</span>&amp;notifyurl=<span class="hljs-symbol">http:</span>/<span class="hljs-regexp">/i12i.com/demo</span><span class="hljs-regexp">/notifyurl.php&amp;returnurl=http:/</span><span class="hljs-regexp">/i12i.com/demo</span><span class="hljs-regexp">/returnurl.php&amp;1b5745912dd5295f1be2631e0a9b8ed6017ddde1</span>
</code></pre><h2 id="-1-paytype-">附录1:paytype 参数值说明</h2>
<table>
<thead>




<tr>
<th>支付方式名称</th>
<th style="text-align:center">支付编号</th>
<th style="text-align:center">状态</th>
</tr>
</thead>
<tbody>




<?php if($userprice):?>
<?php foreach($userprice as $key=>$val):?>






<tr>
<td><?php echo $val[ 'name']?></td>
<td style="text-align:center"><?php echo $shuzu[$key]['acw']?></td>

 <td>
                                                    <?php if($val[ 'is_state']=='0' ):?>

															<span  style="background-color: #5cb85c;" class="layui-badge-rim layui-bg-green">正常</span>
                                                       
                                                            
                                                        
                                                        <?php else:?>

															<span class="layui-badge-rim layui-bg-cyan">关闭</span>
                                                           
                                                            
                                                            
                                                       <?php endif;?>
 </td>

</tr>




<?php endforeach;?>
<?php endif;?>








</tbody>
</table>
<h2 id="-2-">附录2:</h2>
<p>当paytype为bank时，bankcode为以下银行取值</p>
<table>
<thead>
<tr>
<th>支付方式名称</th>
<th style="text-align:center">支付编号</th>
</tr>
</thead>
<tbody>
<tr>
<td>中国工商银行</td>
<td style="text-align:center">ICBC</td>
</tr>
<tr>
<td>中国农业银行</td>
<td style="text-align:center">ABC</td>
</tr>
<tr>
<td>中国银行</td>
<td style="text-align:center">BOCSH</td>
</tr>
<tr>
<td>建设银行</td>
<td style="text-align:center">CCB</td>
</tr>
<tr>
<td>招商银行</td>
<td style="text-align:center">CMB</td>
</tr>
<tr>
<td>浦发银行</td>
<td style="text-align:center">SPDB</td>
</tr>
<tr>
<td>广发银行</td>
<td style="text-align:center">GDB</td>
</tr>
<tr>
<td>交通银行</td>
<td style="text-align:center">BOCOM</td>
</tr>
<tr>
<td>邮政储蓄银行</td>
<td style="text-align:center">PSBC</td>
</tr>
<tr>
<td>中信银行</td>
<td style="text-align:center">CNCB</td>
</tr>
<tr>
<td>民生银行</td>
<td style="text-align:center">CMBC</td>
</tr>
<tr>
<td>光大银行</td>
<td style="text-align:center">CEB</td>
</tr>
<tr>
<td>华夏银行</td>
<td style="text-align:center">HXB</td>
</tr>
<tr>
<td>兴业银行</td>
<td style="text-align:center">CIB</td>
</tr>
<tr>
<td>上海银行</td>
<td style="text-align:center">BOS</td>
</tr>
<tr>
<td>上海农商</td>
<td style="text-align:center">SRCB</td>
</tr>
<tr>
<td>平安银行</td>
<td style="text-align:center">PAB</td>
</tr>
<tr>
<td>北京银行</td>
<td style="text-align:center">BCCB</td>
</tr>
</tbody>
</table>
<h2 id="-">异步通知回调</h2>
<h3 id="1-post">1 通知方式：post</h3>
<h4 id="2-">2 参数说明:</h4>
<table>
<thead>
<tr>
<th>参数</th>
<th style="text-align:center">参数说明</th>
<th style="text-align:center">类型</th>
<th style="text-align:right">备注</th>
</tr>
</thead>
<tbody>
<tr>
<td>status</td>
<td style="text-align:center">订单状态</td>
<td style="text-align:center">int(1)</td>
<td style="text-align:right">1成功 0失败</td>
</tr>
<tr>
<td>customerid</td>
<td style="text-align:center">商户编号</td>
<td style="text-align:center">int(8)</td>
<td style="text-align:right"></td>
</tr>
<tr>
<td>sdpayno</td>
<td style="text-align:center">平台订单号</td>
<td style="text-align:center">varchar(20)</td>
<td style="text-align:right"></td>
</tr>
<tr>
<td>sdorderno</td>
<td style="text-align:center">商户订单号</td>
<td style="text-align:center">varchar(20)</td>
<td style="text-align:right"></td>
</tr>
<tr>
<td>total_fee</td>
<td style="text-align:center">交易金额</td>
<td style="text-align:center">decimal(10,2)</td>
<td style="text-align:right">最多两位小数</td>
</tr>
<tr>
<td>paytype</td>
<td style="text-align:center">支付类型</td>
<td style="text-align:center">varchar(20)</td>
<td style="text-align:right"></td>
</tr>
<tr>
<td>remark</td>
<td style="text-align:center">订单备注说明</td>
<td style="text-align:center">varchar(50)</td>
<td style="text-align:right">原样返回</td>
</tr>
<tr>
<td>sign</td>
<td style="text-align:center">md5验证签名</td>
<td style="text-align:center">varchar(32)</td>
<td style="text-align:right">参照签名方法</td>
</tr>
</tbody>
</table>
<h4 id="3-md5-">3 md5签名方法:</h4>
<p>{value}要替换成接收到的值，{apikey}要替换成平台分配的接入密钥，可在商户后台获取</p>
<pre><code>customerid={<span class="hljs-keyword">value</span>}&amp;status={<span class="hljs-keyword">value</span>}&amp;sdpayno={<span class="hljs-keyword">value</span>}&amp;sdorderno={<span class="hljs-keyword">value</span>}&amp;total_fee={<span class="hljs-keyword">value</span>}&amp;paytype={<span class="hljs-keyword">value</span>}&amp;{apikey}
</code></pre><p>使用md5签名上面拼接的字符串即可生成小写的32位密文</p>
<h4 id="4-">4收到通知回复</h4>
<p>异步通知会在用户付款后立刻通知商户网站 商户收到消息后需要输出相关字符 我们服务器就不会在发送通知为检测到 success 我们服务器会 在第一次 30秒  第二次  5分钟  第三次 10分钟 后通知</p>
<pre><code><span class="hljs-title">success</span>    代表成功  收到后不会再次发送通知
</code></pre><h2 id="-">同步通知跳转</h2>
<h3 id="1-get">1 通知方式：get</h3>
<h4 id="2-">2 参数说明:</h4>
<table>
<thead>
<tr>
<th>参数</th>
<th style="text-align:center">参数说明</th>
<th style="text-align:center">类型</th>
<th style="text-align:right">备注</th>
</tr>
</thead>
<tbody>
<tr>
<td>status</td>
<td style="text-align:center">订单状态</td>
<td style="text-align:center">int(1)</td>
<td style="text-align:right">1成功 0失败</td>
</tr>
<tr>
<td>customerid</td>
<td style="text-align:center">商户编号</td>
<td style="text-align:center">int(8)</td>
<td style="text-align:right"></td>
</tr>
<tr>
<td>sdpayno</td>
<td style="text-align:center">平台订单号</td>
<td style="text-align:center">varchar(20)</td>
<td style="text-align:right"></td>
</tr>
<tr>
<td>sdorderno</td>
<td style="text-align:center">商户订单号</td>
<td style="text-align:center">varchar(20)</td>
<td style="text-align:right"></td>
</tr>
<tr>
<td>total_fee</td>
<td style="text-align:center">交易金额</td>
<td style="text-align:center">decimal(10,2)</td>
<td style="text-align:right">最多两位小数</td>
</tr>
<tr>
<td>paytype</td>
<td style="text-align:center">支付类型</td>
<td style="text-align:center">varchar(20)</td>
<td style="text-align:right"></td>
</tr>
<tr>
<td>remark</td>
<td style="text-align:center">订单备注说明</td>
<td style="text-align:center">varchar(50)</td>
<td style="text-align:right">原样返回</td>
</tr>
<tr>
<td>sign</td>
<td style="text-align:center">md5验证签名</td>
<td style="text-align:center">varchar(32)</td>
<td style="text-align:right">参照签名方法</td>
</tr>
</tbody>
</table>
<h4 id="3-md5-">3 md5签名方法:</h4>
<p>{value}要替换成接收到的值，{apikey}要替换成平台分配的接入密钥，可在商户后台获取</p>
<pre><code>customerid={<span class="hljs-keyword">value</span>}&amp;status={<span class="hljs-keyword">value</span>}&amp;sdpayno={<span class="hljs-keyword">value</span>}&amp;sdorderno={<span class="hljs-keyword">value</span>}&amp;total_fee={<span class="hljs-keyword">value</span>}&amp;paytype={<span class="hljs-keyword">value</span>}&amp;{apikey}
</code></pre><h2 id="-">查询订单</h2>
<h3 id="1-">1 请求地址</h3>
<p>只能查询最近三天的订单</p>
<blockquote>
<p><a href="http://www.域名.com/apiorderquery">http://www.域名.com/apiorderquery</a></p>
</blockquote>
<h3 id="2-http-post-get">2 请求方式：HTTP post / get</h3>
<h3 id="3-">3 请求参数:</h3>
<table>
<thead>
<tr>
<th>字段名称</th>
<th style="text-align:center">字段说明</th>
<th style="text-align:center">类型</th>
<th style="text-align:center">必填</th>
<th style="text-align:right">备注</th>
</tr>
</thead>
<tbody>
<tr>
<td>customerid</td>
<td style="text-align:center">商户号</td>
<td style="text-align:center">int</td>
<td style="text-align:center">Y</td>
<td style="text-align:right">例:10000</td>
</tr>
<tr>
<td>sdorderno</td>
<td style="text-align:center">商户订单号不超过20</td>
<td style="text-align:center">string</td>
<td style="text-align:center">Y</td>
<td style="text-align:right">201758985234234234</td>
</tr>
<tr>
<td>reqtime</td>
<td style="text-align:center">时间戳</td>
<td style="text-align:center">string(14)</td>
<td style="text-align:center">Y</td>
<td style="text-align:right">yyyymmddhhmmss</td>
</tr>
<tr>
<td>sign</td>
<td style="text-align:center">加密字符</td>
<td style="text-align:center">string</td>
<td style="text-align:center">Y</td>
<td style="text-align:right">MD5加密 看下面5加密方法</td>
</tr>
</tbody>
</table>
<h3 id="4-md5-">4 md5签名方法</h3>
<p>{value}要替换成接收到的值，{apikey}要替换成平台分配的接入密钥，可在商户后台获取</p>
<pre><code>customerid={<span class="hljs-keyword">value</span>}&amp;sdorderno={<span class="hljs-keyword">value</span>}&amp;reqtime={<span class="hljs-keyword">value</span>}&amp;{apikey}
</code></pre><p>使用md5签名上面拼接的字符串即可生成小写的32位密文</p>
<h3 id="5-">5 查询结果返回：</h3>
<h5 id="-">如果订单成功则返回</h5>
<pre><code>{"<span class="hljs-attribute">status</span>":<span class="hljs-value"><span class="hljs-number">1</span></span>,"<span class="hljs-attribute">msg</span>":<span class="hljs-value"><span class="hljs-string">"成功订单"</span></span>,"<span class="hljs-attribute">sdorderno</span>":<span class="hljs-value"><span class="hljs-string">"商户订单号"</span></span>,"<span class="hljs-attribute">total_fee</span>":<span class="hljs-value"><span class="hljs-string">"订单金额"</span></span>,"<span class="hljs-attribute">sdpayno</span>":<span class="hljs-value"><span class="hljs-string">"平台订单号"</span></span>}
</code></pre><h5 id="-">如果订单未付款或失败则返回</h5>
<pre><code>{"<span class="hljs-attribute">status</span>":<span class="hljs-value"><span class="hljs-number">0</span></span>,"<span class="hljs-attribute">msg</span>":<span class="hljs-value"><span class="hljs-string">"失败订单"</span></span>}
</code></pre><h2 id="-">下发接口</h2>
<h3 id="1-">1 请求地址</h3>
<p>只能查询最近三天的订单</p>
<blockquote>
<p><a href="http://www.域名.com/apixiafa">http://www.域名.com/apixiafa</a></p>
</blockquote>
<h3 id="2-post">2 请求方式：post</h3>
<h3 id="3-">3 请求参数:</h3>
<table>
<thead>
<tr>
<th>字段名称</th>
<th style="text-align:center">字段说明</th>
<th style="text-align:center">类型</th>
<th style="text-align:center">必填</th>
<th style="text-align:right">备注</th>
</tr>
</thead>
<tbody>
<tr>
<td>customerid</td>
<td style="text-align:center">商户号</td>
<td style="text-align:center">int</td>
<td style="text-align:center">Y</td>
<td style="text-align:right">例:10000</td>
</tr>
<tr>
<td>sdorderno</td>
<td style="text-align:center">商户订单号不超过30</td>
<td style="text-align:center">string</td>
<td style="text-align:center">Y</td>
<td style="text-align:right">201758985234234234</td>
</tr>
<tr>
<td>name</td>
<td style="text-align:center">姓名</td>
<td style="text-align:center">string(10)</td>
<td style="text-align:center">Y</td>
<td style="text-align:right">结算银行卡姓名</td>
</tr>
<tr>
<td>account</td>
<td style="text-align:center">银行卡号</td>
<td style="text-align:center">string(10)</td>
<td style="text-align:center">Y</td>
<td style="text-align:right">结算银行卡卡号</td>
</tr>
<tr>
<td>bank</td>
<td style="text-align:center">银行名称</td>
<td style="text-align:center">string(10)</td>
<td style="text-align:center">Y</td>
<td style="text-align:right">结算银行名称</td>
</tr>
<tr>
<td>dizhi</td>
<td style="text-align:center">开户行</td>
<td style="text-align:center">string(10)</td>
<td style="text-align:center">Y</td>
<td style="text-align:right">结算银行开户行地址</td>
</tr>
<tr>
<td>tel</td>
<td style="text-align:center">手机号</td>
<td style="text-align:center">string(10)</td>
<td style="text-align:center">Y</td>
<td style="text-align:right">手机号码验证</td>
</tr>
<tr>
<td>sign</td>
<td style="text-align:center">加密字符</td>
<td style="text-align:center">string</td>
<td style="text-align:center">Y</td>
<td style="text-align:right">MD5加密 看下面5加密方法</td>
</tr>
</tbody>
</table>
<h3 id="4-md5-">4 md5签名方法</h3>
<p>{value}要替换成接收到的值，{apikey}要替换成平台分配的接入密钥，可在商户后台获取</p>
<pre><code>customerid={<span class="hljs-keyword">value</span>}&amp;sdorderno={<span class="hljs-keyword">value</span>}&amp;name={name}&amp;account={account}&amp;bank={bank}&amp;dizhi={dizhi}&amp;tel={tel}&amp;{apikey}
</code></pre><p>使用md5签名上面拼接的字符串即可生成小写的32位密文</p>
<h3 id="5-">5 查询结果返回：</h3>
<h5 id="-">如果订单成功则返回</h5>
<pre><code>{"<span class="hljs-attribute">status</span>":<span class="hljs-value"><span class="hljs-number">1</span></span>,"<span class="hljs-attribute">msg</span>":<span class="hljs-value"><span class="hljs-string">"提交成功"</span></span>,"<span class="hljs-attribute">sdorderno</span>":<span class="hljs-value"><span class="hljs-string">"商户订单号"</span></span>}
</code></pre><h5 id="-">如果订单未付款或失败则返回</h5>
<pre><code>{"<span class="hljs-attribute">status</span>":<span class="hljs-value"><span class="hljs-number">0</span></span>,"<span class="hljs-attribute">msg</span>":<span class="hljs-value"><span class="hljs-string">"失败订单"</span></span>}
</code></pre><h3 id="status-">status 返回值说明</h3>
<table>
<thead>
<tr>
<th>参数值</th>
<th style="text-align:center">说明</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td style="text-align:center">提交成功</td>
</tr>
<tr>
<td>2</td>
<td style="text-align:center">MD5验证失败</td>
</tr>
<tr>
<td>3</td>
<td style="text-align:center">姓名错误</td>
</tr>
<tr>
<td>4</td>
<td style="text-align:center">银行卡格式错误</td>
</tr>
<tr>
<td>5</td>
<td style="text-align:center">手机号错误</td>
</tr>
<tr>
<td>6</td>
<td style="text-align:center">余额错误</td>
</tr>
<tr>
<td>0</td>
<td style="text-align:center">提交失败</td>
</tr>
</tbody>
</table>
</div>
</body></html>





					

				</div>
			</div>

			
		
		</div>
	</div>
	

		

  </div>

  
  <div class="layui-footer footer footer-demo">
  
</div>


<div class="site-tree-mobile layui-hide">
  <i class="layui-icon">&#xe602;</i>
</div>
<div class="site-mobile-shade"></div>
<script src="../layui/layui.js"></script>
<script>
window.global = {
  pageType: 'demo'
  ,preview: function(){
    var preview = document.getElementById('LAY_preview');
    return preview ? preview.innerHTML : '';
  }()
};
layui.config({
  base: '../layui/lay/modules/'
  ,version: '1508154136729'
}).use('global');


</script>

</div>
</body>
</html>