<?php

namespace App\Widgets;

use Caffeinated\Widgets\Widget;

use App\Modules\Newsdesk\Http\Models\News as news;

use App;
use Cache;
use Config;
use Menu;
use Session;
use Theme;


class TopNews extends Widget
{

	public function handle()
	{

		$activeTheme = Theme::getActive();
		$lang = Session::get('locale');

/*
		$articles = Cache::get('widget_top_news', null);

		if ($articles == null) {
			$articles = Cache::rememberForever('widget_top_news', function() {
				return News::IsPublished()->IsFeatured()->LimitTop()->orderBy('order')->get();
			});
		}

// 		$articles = News::IsPublished()->IsFeatured()->LimitTop()->orderBy('order')->get();
// dd($articles);

		return Theme::View($activeTheme . '::' . 'widgets.top_news',
			compact(
				'articles',
				'lang'
			));
*/

//		$articles = News::IsPublished()->IsFeatured()->LimitTop()->orderBy('order')->get();
		$articles = News::IsPublished()->IsFeatured()->LimitTop()->SiteID()->orderBy('order')->get();
// dd($articles);

		return Theme::View($activeTheme . '::' . 'widgets.top_news',
			compact(
				'articles',
				'lang'
			));



	}


}
