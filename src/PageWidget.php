<?php

namespace yuankezhan\yiiPageWidget;
use yii\base\Widget as YiiWidget;

class PageWidget extends YiiWidget
{
    /**
     * @var string[]
     * 自定义排版。可选值有：count（总条目输区域）、prev（上一页区域）、page（分页区域）、next（下一页区域）、limit（条目选项区域）、refresh 、skip（快捷跳页区域）
     */
    public $layout = ['prev', 'page', 'next', 'limit'];

    /**
     * 自定义主题。支持传入：颜色值，或任意普通字符。如：
    1. theme: '#c00'
    2. theme: 'xxx' //将会生成 class="layui-laypage-xxx" 的CSS类，以便自定义主题
     * @var string
     */
    public $theme;

    /**
     * 自定义“上一页”的内容，支持传入普通文本和HTML
     * @var string
     */
    public $prev = '上一页';

    /**
     * 自定义“下一页”的内容，同上
     * @var string
     */
    public $next = '下一页';

    /**
     * 自定义“首页”的内容，同上
     * @var string
     */
    public $first = '首页';

    /**
     * 自定义“尾页”的内容，同上
     * @var string
     */
    public $last = '尾页';

    /**
     * 连续出现的页码个数
     * @var int
     */
    public $groups = 5;

    /**
     * 当前页
     * @var int
     */
    public $pageIndex = 1;

    /**
     * 每页条数的选择项。如果 layout 参数开启了 limit，则会出现每页条数的select选择框
     * @var int[]
     */
    public $limits = [10, 20, 30, 40, 50];

    /**
     * 每页显示的条数。将会借助 count 和 limit 计算出分页数。
     * @var int
     */
    public $pageSize = 10;

    /**
     * 数据总数。一般通过服务端得到
     * @var int
     */
    public $count;

    /**
     * 点击分页js回调
     * @var string
     */
    public $jsCallback;

    /**
     * 点击分页js回调 传递的数据
     * @var string|array
     */
    public $jsCallbackData;

    /**
     * 点击分页跳转链接
     * @var string
     */
    public $url;

    public function run()
    {
        return $this->render('index', [
            'layout' => $this->layout,
            'theme' => $this->theme,
            'prev' => $this->prev,
            'next' => $this->next,
            'first' => $this->first,
            'last' => $this->last,
            'groups' => $this->groups,
            'curr' => $this->pageIndex,
            'limits' => $this->limits,
            'limit' => $this->pageSize,
            'count' => $this->count,
            'url' => $this->url,
            'callback' => $this->jsCallback,
            'callbackData' => $this->jsCallbackData,
        ]);
    }
}