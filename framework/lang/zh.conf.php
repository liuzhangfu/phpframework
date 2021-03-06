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

//系统默认的语言包的定义，请勿直接修改它，您可以在自身的语言包定义中覆盖系统默认的语言包定义项
return array(
			'_SYS_LANG_NOT_SUPPORT_PATHINFO' => '当前web服务器不支持此种URL模式',
			'_SYS_LANG_URL_PARAMETER_ERROR' => 'URL参数错误，需要控制器controller和操作action',
			'_SYS_LANG_URL_PARAMETER_VALUE_INVALID' => 'URL参数值存在非法字符',
			'_SYS_LANG_CLASS_NOT_FIND' => '类文件找不到，加载类文件出错',
			'_SYS_LANG_TEMPLATE_NOT_FIND' => '模板文件找不到，加载模板文件出错',
			'_SYS_LANG_EXT_NOT_FIND' => '扩展没有找到',
			'_SYS_LANG_NEW_PDO_ERROR' => 'new pdo 错误, 无法创建pdo对象,请检查pdo配置信息',
			'_SYS_LANG_EXECUTE_SQL_ERROR' => '执行SQL报错',
			'_SYS_LANG_MEM_CONNECT_ERROR' => '链接到memcache报错',
			'_SYS_LANG_FILE_NOT_FIND' => '对不起，文件没有找到',
);
