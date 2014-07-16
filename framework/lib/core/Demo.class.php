<?php
// +----------------------------------------------------------------------
// | RPF  [Rain PHP Framework ]
// +----------------------------------------------------------------------
// | Copyright (c) 2014 http://www.94cto.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: Rain <563268276@qq.com>
// +----------------------------------------------------------------------

defined('RPF_PATH') or exit();

class Demo
{
	/*
	  * 功能  ： 生成Demo例子程序
	  * 参数  ： void
	  * 返回  ： void
	*/
	public static function cdemo()
	{
		if (!C_DEMO)
		  return;
		$con_file = APP_C.Kernel::$_controller.CLS_C_EXT;
		$con_name = Kernel::$_controller.Kernel::$_conf['C_NAME'];

		$act_file = APP_A.Kernel::$_controller.'/'.ucfirst(Kernel::$_controller.'_'.Kernel::$_action).CLS_A_EXT;
		$act_name = Kernel::$_controller.'_'.Kernel::$_action.Kernel::$_conf['A_NAME'];

		$page_file = APP_V.Kernel::$_controller.'/'.strtolower(Kernel::$_action).Kernel::$_conf['V_NAME'];
		$dirArr = array(
					dirname($act_file),
					dirname($page_file),
		);
		mkdirs($dirArr);
		$con_content = <<<EOT
<?php
/**
 *  自动生成的代码
 *  author: None
 **/
class $con_name extends Controller
{
	//执行相关的初始化操作
	public function init()
	{
		//初始化代码，您可以写在这里
	}
	//其他方法可以任意定义。但是框架只调用controller类里面的init
}
EOT;
		$act_content = <<<EOT
<?php
/**
 *  自动生成的代码
 *  author: None
 **/
class $act_name extends Action
{
	//执行相关的初始化操作
	public function init()
	{
		//初始化代码，您可以写在这里
	}

	//真正需要进行逻辑处理的运行代码类似其他框架的controller的action方法
	public function run()
	{
		\$this->display();
	}
	//其他方法可以任意定义。但是框架只调用acion类里面的init和run
}
EOT;
	$page_content = <<<EOT
<html>
	<head>
		<title>框架使用说明API文档</title>
	</head>
	<body>
		<h1>欢迎使用Rain PHP Framework(RPF) VVERSION</h1>
		<h4>框架核心理念</h4>
		<p>框架整体是基于MVCA架构模式，之所以自创这样的模式，是为了更好的解放C即controller，让它真正只做好它的控制器功能,做到流程控制,把真正处理逻辑放在action中，让它可以互不干扰，不同的action加载不同的action操作类，让它们不必要加载程序用不到的代码，一定程度上提升性能。</p>
		<h4>几点误区澄清</h4>
		<p>1.构建框架本身并不是为了所谓的重复造轮子，更多考虑自我提升和实践。很多时候只有亲身尝试做过，才会发现自己的不足，才有可能不断的进行自我完善。发布框架本身也仅供学习参考，并未涉及其他层面的考量。</p>
		<p>2.框架整体实现上或多或少参考了一些个人熟悉的框架模式，但绝非照抄照搬，总体而言是在借鉴的基础上做更多的自己认可的架构调整。个人并不觉得完全的自主创新是完美的方案，否则更像是重复的造轮子工程。能够把握细节，大同小异的基础上构建自己的创新点，不仅仅可以减少熟悉和使用框架的成本，更加减少不必要的探索和挖掘道路的成本。</p>
		<h4>框架流程映射</h4>
		<p>单入口映射，例如针对通常web网站，index.php前台入口/admin.php后台入口</p>
		<p>所有项目入口文件都必须包含框架库中的ini.php文件，该文件内置定义大量的常量，以及相关的php的选项设置，然后ini.php文件末尾初始化kernel/Kernel类，调用start方法进行包括加载配置/加载语言包/加载用户自定义函数/初始化session/解析请求URL/项目目录检测，最终根据请求URL，初始化相应的controller/action类，然后调用controller的init方法以及action的init和run方法,整体框架引导结束，进入用户代码逻辑层。</p>
		<h4>框架提供常用函数说明</h4>
		<p>所有框架系统的函数库均在框架目录下的functions/core.func.php文件里面,针对VVERSION版本的函数介绍如下</p>
		<p><b>函数：</b>getIp(\$num = false)</p>
		<p><b>功能：</b>获取用户客户端IP地址</p>
		<p><b>参数：</b></p>
		<p>\$num  是否返回ip地址对应的整数值，为true返回ip2long的结果，否则返回ip字符串</p>
		<p><b>返回： </b>      根据\$num的值不同，返回不同，为true返回ip2long的结果，否则返回ip字符串</p>
		<p>
####################################################################################################################################################################################
		</p>
		<p><b>函数：</b>setc(\$name, \$value, \$expire = null, \$path = '/', \$domain = null, \$secure = false, \$httponly = true)</p>
		<p><b>功能：</b>向客户端设置cookie</p>
		<p><b>参数：</b></p>
		<p>\$name      cookie名称</p>
		<p>\$value     cookie值</p>
		<p>\$expire    过期时间，单位:秒</p>
		<p>\$path      cookie路径</p>
		<p>\$domain    cookie域名</p>
		<p>\$secure    https的cookie模式</p>
		<p>\$httponly  httponly默认true避免JS读取cookie</p>
		<p><b>返回： </b>    成功返回true，失败返回false</p>
		<p>
####################################################################################################################################################################################
		</p>
		<p><b>函数：</b>getc(\$name)</p>
		<p><b>功能：</b>获取客户端cookie</p>
		<p><b>参数：</b></p>
		<p>\$name  cookie名称</p>
		<p><b>返回： </b>成功返回经过htmlspecialchars处理后的值，失败返回false</p>
		<p>
####################################################################################################################################################################################
		</p>
		<p><b>函数：</b>delc(\$name)</p>
		<p><b>功能：</b>删除客户端cookie</p>
		<p><b>参数：</b></p>
		<p>\$name  cookie名称</p>
		<p><b>返回： </b>同setcookie</p>
		<p>
####################################################################################################################################################################################
		</p>
		<p><b>函数：</b>sendmail(\$to, \$subject = '', \$body = '')</p>
		<p><b>功能：</b>发送邮件,实现上基于第三方PHPMailer类,使用前必须先配置好相关常量，详见init.php里面的介绍</p>
		<p><b>参数：</b></p>
		<p>\$to       邮件接收方email地址</p>
		<p>\$subject  邮件标题</p>
		<p>\$body     邮件内容，支持html</p>
		<p><b>返回： </b>成功返回true，失败返回false</p>
		<p>
####################################################################################################################################################################################
		</p>
		<p><b>函数：</b>getpath(\$path, \$p = true)</p>
		<p><b>功能：</b>用于文件绝对路径和URL绝对路径相互转换</p>
		<p><b>参数：</b></p>
		<p>\$path     需要转换的路径</p>
		<p>\$p        true返回url绝对路径，false返回文件绝对路径</p>
		<p><b>返回： </b>返回转换好的字符串</p>
		<p>
####################################################################################################################################################################################
		</p>
		<p><b>函数：</b>rm(\$dir, \$deleteRootToo = false)</p>
		<p><b>功能：</b>递归删除目录和文件</p>
		<p><b>参数：</b></p>
		<p>\$dir                  需要执行删除操作的目录地址</p>
		<p>\$deleteRootToo        为true删除当前指定目录自身，false只删除当前目录下子目录</p>
		<p><b>返回： </b>成功返回true，失败返回false</p>
		<p>
####################################################################################################################################################################################
		</p>
		<p><b>函数：</b>safe()</p>
		<p><b>功能：</b>安全模式过滤函数，对\$_REQUEST / \$_POST / \$_GET / \$_COOKIE / \$_SERVER的键值对进行尽可能的过滤，做到尽量的安全</p>
		<p><b>参数：</b>void</p>
		<p><b>返回： </b>void</p>
		<p>
####################################################################################################################################################################################
		</p>
		<p><b>函数：</b>send_http_status(\$code)</p>
		<p><b>功能：</b>根据传递的http状态头的返回值设在http信息</p>
		<p><b>参数：</b></p>
		<p>\$code    http头状态码</p>
		<p><b>返回： </b>void</p>
		<p>
####################################################################################################################################################################################
		</p>
		<p><b>函数：</b>get_word(\$str, \$chinese = true)</p>
		<p><b>功能：</b>获取文本字符串</p>
		<p><b>参数：</b></p>
		<p>\$str        待检测字符串</p>
		<p>\$chinese    是否支持中文字符</p>
		<p><b>返回： </b>成功返回文本字符串，字符串非法时返回false</p>
		<p>
####################################################################################################################################################################################
		</p>
		<p><b>函数：</b>get_link(\$str, \$chinese = true)</p>
		<p><b>功能：</b>获取链接字符串</p>
		<p><b>参数：</b></p>
		<p>\$str        待检测字符串</p>
		<p>\$chinese    是否支持中文字符</p>
		<p><b>返回： </b>成功返回字符串，字符串非法时返回false</p>
		<p>
####################################################################################################################################################################################
		</p>
		<p><b>函数：</b>check_code(\$name)</p>
		<p><b>功能：</b>检测验证码是否正确</p>
		<p><b>参数：</b></p>
		<p>\$name    填写验证码input表单的name值</p>
		<p><b>返回： </b>成功返回true，错误返回false</p>
		<p>
####################################################################################################################################################################################
		</p>
		<p><b>函数：</b>check_data(\$data, \$type = 'post')</p>
		<p><b>功能：</b>检测post或get请求是否传递类所需的所有参数</p>
		<p><b>参数：</b></p>
		<p>\$data       待检测的参数数组</p>
		<p>\$type       类型是post或get</p>
		<p><b>返回： </b>成功返回true，错误返回false</p>
		<p>
####################################################################################################################################################################################
		</p>
		<p><b>函数：</b>read_dir(\$dir, \$clean = true)</p>
		<p><b>功能：</b>递归读取返回指定目录下所有文件</p>
		<p><b>参数：</b></p>
		<p>\$dir       待扫描的目录</p>
		<p>\$clean     该参数仅供函数内部使用，无需修改设置</p>
		<p><b>返回： </b>成功返回一维数组array，失败返回false</p>
		<p>
####################################################################################################################################################################################
		</p>
		<p><b>函数：</b>import(\$file)</p>
		<p><b>功能：</b>包含文件，底层使用php的require_once，该函数只是做包含文件个数统计功能</p>
		<p><b>参数：</b></p>
		<p>\$file    需要包含的文件</p>
		<p><b>返回： </b>返回require_once的返回值</p>
		<p>
####################################################################################################################################################################################
		</p>
		<p><b>函数：</b>mkdirs(\$dir)</p>
		<p><b>功能：</b>递归创建目录</p>
		<p><b>参数：</b></p>
		<p>\$dir    需要创建的目录名称</p>
		<p><b>返回： </b>失败返回false</p>
		<p>
####################################################################################################################################################################################
		</p>
		<p><b>函数：</b>U(\$act, \$param = null, \$file = null, \$domain = null)</p>
		<p><b>功能：</b>根据URL路由模式，生成特定模式下的URL地址</p>
		<p><b>参数：</b></p>
		<p>\$act      controller/action例如User/add</p>
		<p>\$param    一维数组，传递给URL的参数，传递参数的key=>value的键值对，可为空</p>
		<p>\$file     入口文件，不含.php扩展名，默认当前入口文件</p>
		<p>\$domain   网址，默认当前host网址</p>
		<p><b>返回： </b>成功返回当前URL路由模式下的URL地址</p>
		<p>
####################################################################################################################################################################################
		</p>
		<h4>框架配置文件介绍说明</h4>
		<p>URL_MODEL:url模式，可选值URL_COMMON/URL_PATHINFO/URL_REWRITE/URL_COMPAT，默认值URL_COMPAT</p>
		<p>LANG: 目前支持zh或en，默认值zh</p>
		<p>M_NAME: 默认的model class的名称后缀，默认值Model</p>
		<p>V_NAME: 默认的view template的文件扩展名，默认值.html</p>
		<p>C_NAME: 默认的controller class的名称后缀，默认值Controller</p>
		<p>A_NAME: 默认的action class的名称后缀，默认值Action</p>
		<p>DB_DSN: DSN方式链接mysql配置，默认mysql:host=127.0.0.1;dbname=test;charset=utf8</p>
		<p>DB_UN: mysql的用户名</p>
		<p>DB_PW: mysql的密码</p>
		<p>DB_PRE:表的前缀</p>
		<p>MEM_HOST: memcache的host</p>
		<p>MEM_PORT: memcache的端口</p>
		<p>MEM_TIMEOUT: memcache的取值超时时间，通常无需修改</p>
		<p>DB_CACHE_TYPE: 数据库数据缓存保存方式，m为内存保存即memcache，f是文件方式</p>
		<p>DB_CACHE_EXPIRE: 数据库查询的缓存时间，默认缓存7200秒即2小时</p>
		<p>ADMIN_APP_NAME: 后台管理模块的APP_NAME</p>
		<p>SESSION_SAVE_TYPE: m值表示保存在memcache，f值表示session是文件保存方式</p>
		<h4>核心类库介绍</h4>
		<p><b>Action类</b></p>
		<p>所有的Action都应该继承此类，下面所关于这个类大致方法介绍</p>
		<p>success/error/timeout用来ajax返回提示信息和状态信息</p>
		<p>checktoken用来检测token是否有效，避免CSRF攻击</p>
		<p>run子类必须重写此方法</p>
		<p>set设置key和value对的值，赋值到模板</p>
		<p>display设置模板，默认模板名称同action名称</p>
		<p>
####################################################################################################################################################################################
		</p>
		<p><b>Image类</b></p>
		<p>getCode(\$width = 70, \$height = 24, \$len = 4)生成验证码</p>
		<p>imageWaterMark用来地图像打水印，参数详见kernel/Image.class.php内置介绍</p>
		<p>resize用来调整图像大小，resize(\$s_img, \$d_img = null, \$percent = 0.5)</p>
		<p>
####################################################################################################################################################################################
		</p>
		<p><b>Mysql类</b></p>
		<p>startTrans用来启动事务</p>
		<p>getInstance静态方法，用来初始化mysql对象，您可以这么使用:\$mysql = Mysql::getInstance();</p>
		<p>commit用来提交事务</p>
		<p>rollback用来回滚事务</p>
		<p>getLastId如果存在自增ID，返回最后一次插入ID值</p>
		<p>connect建立mysql链接</p>
		<p>fetchOne(\$sql, \$data = array())获取单条记录，无缓存，例如\$data=array(':id' => \$id);</p>
		<p>fetchAll(\$sql, \$data = array())获取全部记录，参数说明同上,无缓存</p>
		<p>fetchOneCache(\$sql, \$data = array(), \$cache_type = null, \$timeout = null)缓存模式读取单条记录</p>
		<p>fetchAllCache(\$sql, \$data = array(), \$cache_type = null, \$timeout = null)缓存模式读取全部记录</p>
		<p>execute(\$sql, \$data = array())执行除了SELECT以外的SQL操作,底层实现调用对应的query方法，只是简便方法参数</p>
		<p>query(\$sql, \$data = array(), \$one = false, \$cache_type = null, \$timeout = null)执行任意SQL，参数说明见kernel/Mysql.class.php</p>
		<p>free，释放mysql</p>
		<p>
####################################################################################################################################################################################
		</p>
		<p><b>Cahe类</b></p>
		<p>用户进行缓存操作的，支持memcache和file两种方式缓存，详见lib/core/Cache.class.php</p>
		<p>
####################################################################################################################################################################################
		</p>
		<p><b>Page类</b></p>
		<p>分页用的类，详见lib/core/Page.class.php</p>
		<p>
####################################################################################################################################################################################
		</p>
		<p><b>Upload类</b></p>
		<p>上传文件用的类，详见lib/core/Upload.class.php</p>
		<p>
####################################################################################################################################################################################
		</p>
		<h4>第三方类库</h4>
		<p>所有的第三方类库都在lib/vendor在VVERSION版本中，只有email一个文件夹，用来支持发送邮件的功能，邮件发送例子代码已经在函数里面说明</p>
	</body>
</html>
EOT;
$page_content = str_replace('VERSION', RPF_VERSION, $page_content);


		if (!is_file($con_file))
			file_put_contents($con_file, $con_content);

		if (!is_file($act_file))
			file_put_contents($act_file, $act_content);

		if (!is_file($page_file))
			file_put_contents($page_file, $page_content);

		unset($act_file, $act_content, $con_file, $con_content, $page_file, $page_content);
	}
}
