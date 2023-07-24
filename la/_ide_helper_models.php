<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Admin
 *
 * @property int $id 用户ID
 * @property string|null $name 系统管理用户名
 * @property string|null $password 密码
 * @property string|null $salt 加密盐
 * @property int $sex 10保密20男30女
 * @property string|null $email 邮件
 * @property string|null $mobile 手机号码
 * @property string|null $login_ip 登陆IP
 * @property int $status 用户状态10是默认正常 20是禁止登陆
 * @property string|null $avatar 用户头像
 * @property string|null $real_name 真是姓名
 * @property string|null $token_time 登陆token时间
 * @property string|null $admin_group_ids 用户权限组ID集合
 * @property int $is_admin 是否管理员 10是，99不是
 * @property int $sort 排序越小越往前
 * @property string $create_at 创建时间
 * @property string $update_at 更新时间
 * @property string|null $token token
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereAdminGroupIds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCreateAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereLoginIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereRealName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereSalt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereTokenTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUpdateAt($value)
 */
	class Admin extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AdminGroup
 *
 * @property int $id ID
 * @property int $parent_id 父ID 0是顶级
 * @property string|null $name 分组名称
 * @property string|null $permission_ids permission_id集合
 * @property int $sort 排序越小越往前
 * @property string $create_at 创建时间
 * @property string $update_at 更新时间
 * @method static \Illuminate\Database\Eloquent\Builder|AdminGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminGroup whereCreateAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminGroup whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminGroup wherePermissionIds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminGroup whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminGroup whereUpdateAt($value)
 */
	class AdminGroup extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AdminLog
 *
 * @property int $id
 * @property string|null $create_at 创建时间
 * @property string|null $update_at 更新时间
 * @property string|null $method 请求方式
 * @property string|null $url 请求url带参数
 * @property string|null $route_name 框架里定义的路由名称
 * @property string|null $path 请求url不带参数
 * @property string|null $request_ip 请求ip
 * @property string|null $data 请求参数
 * @property int $admin_id 管理员ID
 * @property string|null $admin_name 管理员名称
 * @property string|null $route_desc 路由描述
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLog whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLog whereAdminName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLog whereCreateAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLog whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLog whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLog wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLog whereRequestIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLog whereRouteDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLog whereRouteName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLog whereUpdateAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminLog whereUrl($value)
 */
	class AdminLog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AdminPermission
 *
 * @property int $id ID
 * @property int $parent_id 父ID 0是顶级
 * @property string|null $name 控制名称
 * @property string|null $url 控制器URL
 * @property string|null $component vue前台页面
 * @property int $is_menu 作为菜单显示,10是,20不是
 * @property string|null $small_icon 小图标名称
 * @property string $create_at 创建时间
 * @property string $update_at 更新时间
 * @property int|null $sort 排序越小越往前
 * @property int $hidden 10显示20不显示
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPermission query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPermission whereComponent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPermission whereCreateAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPermission whereHidden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPermission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPermission whereIsMenu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPermission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPermission whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPermission whereSmallIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPermission whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPermission whereUpdateAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPermission whereUrl($value)
 */
	class AdminPermission extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Banner
 *
 * @property int $id bannerID
 * @property string $name banner名称
 * @property int|null $admin_id 创建ID
 * @property string $url 跳转链接
 * @property int $sort 排序越小越往前
 * @property string|null $start_time 开始时间
 * @property string|null $end_time 结束时间
 * @property string $create_at 创建时间
 * @property string $update_at 更新时间
 * @property string|null $pic_path 图片地址
 * @property string|null $video_path 视频地址
 * @property string|null $platform 平台类型
 * @property string|null $lang 语言类型默认
 * @method static \Illuminate\Database\Eloquent\Builder|Banner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner query()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereCreateAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner wherePicPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereUpdateAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereVideoPath($value)
 */
	class Banner extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Config
 *
 * @property int $id
 * @property string|null $name 名称
 * @property string|null $value 储存的值
 * @property string $create_at 创建时间
 * @property string $update_at 更新时间
 * @method static \Illuminate\Database\Eloquent\Builder|Config newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Config newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Config query()
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereCreateAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereUpdateAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereValue($value)
 */
	class Config extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Download
 *
 * @property int $id
 * @property string|null $name 文件名称
 * @property string|null $introduction 文件简介
 * @property string|null $url 连接地址
 * @property int $is_local 上传到本地服务器10是，20是外部地址
 * @property int $admin_id 管理员ID
 * @property string $create_at 创建时间
 * @property string $update_at 更新时间
 * @property int $is_show 是否显示10是20不显示
 * @property int|null $sort 排序越小越往前
 * @property string|null $path 文件路径url
 * @property int $download_cate_id 分类id
 * @property string|null $pic 封面图url
 * @property string $platform 平台类型
 * @property string $lang 语言类型
 * @method static \Illuminate\Database\Eloquent\Builder|Download newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Download newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Download query()
 * @method static \Illuminate\Database\Eloquent\Builder|Download whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Download whereCreateAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Download whereDownloadCateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Download whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Download whereIntroduction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Download whereIsLocal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Download whereIsShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Download whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Download whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Download wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Download wherePic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Download wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Download whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Download whereUpdateAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Download whereUrl($value)
 */
	class Download extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DownloadCate
 *
 * @property int $id
 * @property string|null $name 分类名称
 * @property int $is_show 是否显示10显示20不显示
 * @property int $sort 排序越小越往前
 * @property string $create_at 创建时间
 * @property string $update_at 更新时间
 * @property string|null $pic 分类图片地址
 * @property string $platform 平台类型
 * @property string $lang 语言类型
 * @property int $parent_id 父级id
 * @method static \Illuminate\Database\Eloquent\Builder|DownloadCate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DownloadCate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DownloadCate query()
 * @method static \Illuminate\Database\Eloquent\Builder|DownloadCate whereCreateAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DownloadCate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DownloadCate whereIsShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DownloadCate whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DownloadCate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DownloadCate whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DownloadCate wherePic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DownloadCate wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DownloadCate whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DownloadCate whereUpdateAt($value)
 */
	class DownloadCate extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Feedback
 *
 * @property int $id ID
 * @property string|null $nick_name 反馈昵称
 * @property string|null $contact 联系方式
 * @property string|null $content 反馈内容
 * @property string $create_at 创建时间
 * @property string $update_at 更新时间
 * @property string $platform 平台类型
 * @property string $lang 语言类型
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback query()
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereCreateAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereNickName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereUpdateAt($value)
 */
	class Feedback extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\File
 *
 * @property int $id 文件ID
 * @property string|null $file_name 文件名称
 * @property string $file_path 文件路径
 * @property int|null $file_size 文件大小
 * @property int|null $admin_id 创建者ID
 * @property int|null $create_at 创建时间
 * @method static \Illuminate\Database\Eloquent\Builder|File newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File query()
 * @method static \Illuminate\Database\Eloquent\Builder|File whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereCreateAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereFileSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereId($value)
 */
	class File extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\FriendLink
 *
 * @property int $id ID
 * @property string $title 标题
 * @property string $url URL
 * @property int $is_follow 是否follow 10是，20不是
 * @property int $is_show 10是显示，20是不显示
 * @property int $sort 排序越小越往前
 * @property string $create_at 创建时间
 * @property string $update_at 更新时间
 * @property string|null $pic 图片地址
 * @property string $platform 平台类型
 * @property string $lang 语言类型
 * @method static \Illuminate\Database\Eloquent\Builder|FriendLink newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FriendLink newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FriendLink query()
 * @method static \Illuminate\Database\Eloquent\Builder|FriendLink whereCreateAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FriendLink whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FriendLink whereIsFollow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FriendLink whereIsShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FriendLink whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FriendLink wherePic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FriendLink wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FriendLink whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FriendLink whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FriendLink whereUpdateAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FriendLink whereUrl($value)
 */
	class FriendLink extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\JobOffers
 *
 * @property int $id ID
 * @property string $title 招聘工种
 * @property string|null $url 招聘链接URL
 * @property string|null $content 招聘内容
 * @property int $is_show 10是显示，20是不显示
 * @property int $sort 排序
 * @property string|null $salary_range 薪资范围
 * @property string|null $place 工作地点
 * @property string|null $number 招聘人数
 * @property string $create_at 创建时间
 * @property string $update_at 更新时间
 * @property string $platform 平台类型
 * @property string $lang 语言类型
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffers newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffers newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffers query()
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffers whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffers whereCreateAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffers whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffers whereIsShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffers whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffers whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffers wherePlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffers wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffers whereSalaryRange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffers whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffers whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffers whereUpdateAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffers whereUrl($value)
 */
	class JobOffers extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\News
 *
 * @property int $id
 * @property int $news_cate_id 新闻分类ID
 * @property string $title 新闻标题
 * @property string|null $short_title 新闻短标题
 * @property string|null $content 新闻内容
 * @property int $admin_id 创建者ID
 * @property int|null $count 浏览数
 * @property int $is_show 10是默认显示，20是不显示
 * @property int $sort 排序越小越往前
 * @property string|null $start_time 开始时间
 * @property string|null $end_time 结束时间
 * @property string $create_at 创建时间
 * @property string $update_at 更新时间
 * @property string|null $pic 图片大图
 * @property string|null $pics 新闻图集
 * @property string|null $seo_title seo标题
 * @property string|null $seo_keyword seo关键词
 * @property string|null $seo_description seo描述
 * @property string $platform 平台类型
 * @property string $lang 语言类型
 * @method static \Illuminate\Database\Eloquent\Builder|News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News query()
 * @method static \Illuminate\Database\Eloquent\Builder|News whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCreateAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereIsShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereNewsCateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News wherePic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News wherePics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereSeoKeyword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereShortTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereUpdateAt($value)
 */
	class News extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\NewsCate
 *
 * @property int $id ID
 * @property int $parent_id 父分类ID
 * @property string $name 新闻分类名称
 * @property int $is_show 10是默认显示，20是不显示
 * @property int $sort 排序越小越往前
 * @property string $create_at 创建时间
 * @property string $update_at 更新时间
 * @property string $platform 平台类型
 * @property string $lang 语言类型
 * @method static \Illuminate\Database\Eloquent\Builder|NewsCate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsCate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsCate query()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsCate whereCreateAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsCate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsCate whereIsShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsCate whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsCate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsCate whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsCate wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsCate whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsCate whereUpdateAt($value)
 */
	class NewsCate extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property int $id 产品id
 * @property int $product_cate_id 产品分类ID
 * @property string|null $title 产品标题
 * @property string|null $short_title 产品短标题
 * @property string|null $content 产品内容
 * @property int $admin_id 创建者ID
 * @property int|null $view_count 浏览数
 * @property int $is_show 10是默认显示，20是不显示
 * @property int $sort 排序越小越往前
 * @property string|null $url 产品外部URL
 * @property string|null $start_time 开始时间
 * @property string|null $end_time 结束时间
 * @property string|null $pic 产品首页大图文件
 * @property string|null $pics 产品多图文件集合
 * @property string $create_at 创建时间
 * @property string $update_at 更新时间
 * @property string|null $video_url 视频地址
 * @property string $platform 平台类型
 * @property string $lang 语言类型
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreateAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereIsShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductCateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereShortTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdateAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereVideoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereViewCount($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductCate
 *
 * @property int $id 产品分类ID
 * @property int $parent_id 父产品分类ID
 * @property string $name 产品分类名称
 * @property int $is_show 是否显示10是显示，20不是
 * @property int $sort 排序越小越往前
 * @property string $url 产品分类外部url
 * @property string $create_at 创建时间
 * @property string $update_at 更新时间
 * @property string|null $description 分类描述
 * @property string|null $pic 产品分类图片url
 * @property string $platform 平台类型
 * @property string $lang 语言类型
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCate query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCate whereCreateAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCate whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCate whereIsShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCate whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCate whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCate wherePic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCate wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCate whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCate whereUpdateAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCate whereUrl($value)
 */
	class ProductCate extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Seo
 *
 * @property int $id
 * @property string|null $title 标题
 * @property string|null $keyword 关键词
 * @property string|null $description 描述
 * @property string|null $position 位置
 * @property string $create_at 创建时间
 * @property string $update_at 更新时间
 * @property int $is_show 是否显示10是20不显示
 * @property int $sort 排序越小越往前
 * @property string $platform 平台类型
 * @property string $lang 语言类型
 * @method static \Illuminate\Database\Eloquent\Builder|Seo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Seo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Seo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Seo whereCreateAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seo whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seo whereIsShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seo whereKeyword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seo whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seo wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seo wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seo whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seo whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seo whereUpdateAt($value)
 */
	class Seo extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Video
 *
 * @property int $id
 * @property int $video_cate_id 分类视频ID
 * @property int $is_local 上传到本地服务器10是，20是外部视频
 * @property string $url 外部视频URL
 * @property string $name 视频名称
 * @property string|null $introduce 视频介绍
 * @property int $is_show 是否显示10显示20不显示
 * @property int $admin_id 创建者ID
 * @property int $count 浏览数
 * @property int $sort 排序越小越往前
 * @property string|null $pic 封面图片url
 * @property string|null $file 视频文件url
 * @property string $create_at 创建时间
 * @property string $update_at 更新时间
 * @property string $platform 平台类型
 * @property string $lang 语言类型
 * @method static \Illuminate\Database\Eloquent\Builder|Video newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Video newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Video query()
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereCreateAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereIntroduce($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereIsLocal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereIsShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video wherePic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereUpdateAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereVideoCateId($value)
 */
	class Video extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\VideoCate
 *
 * @property int $id
 * @property int $parent_id 父分类名称
 * @property string|null $name 视频分类名称
 * @property int $is_show 是否显示10显示20不显示
 * @property int $sort 排序越小越往前
 * @property string $create_at 创建时间
 * @property string $update_at 更新时间
 * @property string $platform 平台类型
 * @property string $lang 语言类型
 * @method static \Illuminate\Database\Eloquent\Builder|VideoCate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VideoCate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VideoCate query()
 * @method static \Illuminate\Database\Eloquent\Builder|VideoCate whereCreateAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VideoCate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VideoCate whereIsShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VideoCate whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VideoCate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VideoCate whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VideoCate wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VideoCate whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VideoCate whereUpdateAt($value)
 */
	class VideoCate extends \Eloquent {}
}

