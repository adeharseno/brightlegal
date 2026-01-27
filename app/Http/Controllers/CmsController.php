<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Statistic;
use App\Models\WhyWorkWithUsCard;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Faq;

class CmsController extends Controller
{
    public function index()
    {
        $stats = [
            'banners' => Banner::count(),
            'statistics' => Statistic::count(),
            'why_work_with_us' => WhyWorkWithUsCard::count(),
            'services' => Service::count(),
            'testimonials' => Testimonial::count(),
            'faqs' => Faq::count(),
        ];
        
        return view('cms.dashboard', compact('stats'));
    }
}
