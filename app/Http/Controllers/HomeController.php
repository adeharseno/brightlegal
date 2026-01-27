<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Statistic;
use App\Models\WhyWorkWithUsSetting;
use App\Models\WhyWorkWithUsCard;
use App\Models\ServicesSetting;
use App\Models\ServiceCategory;
use App\Models\Service;
use App\Models\TestimonialsSetting;
use App\Models\Testimonial;
use App\Models\FaqsSetting;
use App\Models\Faq;
use App\Models\ReadyToTalk;

class HomeController extends Controller
{
    public function index()
    {
        // Banner
        $banner = Banner::active()->ordered()->first();
        
        // Statistics (Section 2)
        $statistics = Statistic::active()->ordered()->get();
        
        // Why Work With Us
        $whyWorkSettings = WhyWorkWithUsSetting::first();
        $whyWorkCards = WhyWorkWithUsCard::active()->ordered()->get();
        
        // Services (limit untuk homepage)
        $servicesSettings = ServicesSetting::first();
        $services = Service::active()->ordered()->take(6)->get();
        
        // Testimonials
        $testimonialsSettings = TestimonialsSetting::first();
        $testimonials = Testimonial::active()->ordered()->get();
        
        // FAQs
        $faqsSettings = FaqsSetting::first();
        $faqs = Faq::active()->ordered()->get();
        
        // Ready to Talk
        $readyToTalk = ReadyToTalk::first();
        
        return view('home', compact(
            'banner',
            'statistics',
            'whyWorkSettings',
            'whyWorkCards',
            'servicesSettings',
            'services',
            'testimonialsSettings',
            'testimonials',
            'faqsSettings',
            'faqs',
            'readyToTalk'
        ));
    }

    public function ourServices()
    {
        // Services
        $servicesSettings = ServicesSetting::first();
        $categories = ServiceCategory::active()->ordered()->with(['services' => function($query) {
            $query->active()->ordered();
        }])->get();
        
        // FAQs
        $faqsSettings = FaqsSetting::first();
        $faqs = Faq::active()->ordered()->get();
        
        // Ready to Talk
        $readyToTalk = ReadyToTalk::first();
        
        return view('our-services', compact(
            'servicesSettings',
            'categories',
            'faqsSettings',
            'faqs',
            'readyToTalk'
        ));
    }
}
