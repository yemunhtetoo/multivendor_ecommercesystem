<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\NewsLetterSubscriber;

class subscribersExport implements WithHeadings,FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // For exporting subscribers emails
        //return NewsletterSubscriber::all();

        //For exporting selected columns
        $subscribersData = NewsletterSubscriber::select('id','email','created_at')->where('status',1)->orderBy('id','Desc')->get();
        return $subscribersData;
    }

    public function headings(): array{
        return['Id','Email','Subscribed on'];
    }
}
