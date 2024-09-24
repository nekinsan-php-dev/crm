<?php

namespace App\Livewire;

use Livewire\Component;

class FacebookLeadsDashboard extends Component
{
    public $totalLeads = 1234;
    public $conversionRate = 15;
    public $avgDealSize = 5678;
    public $leadQualityScore = 7.5;
    public $leadSources;
    public $leadStatus;
    public $recentLeads;

    public function mount()
    {
        // In a real application, you would fetch this data from your database or Facebook API
        $this->leadSources = [
            'labels' => ['Facebook Ads', 'Facebook Page', 'Facebook Groups', 'Instagram', 'Other'],
            'data' => [300, 150, 100, 75, 25],
        ];

        $this->leadStatus = [
            'labels' => ['New', 'Contacted', 'Qualified', 'Proposal', 'Closed'],
            'data' => [65, 59, 80, 81, 56],
        ];

        $this->recentLeads = [
            ['name' => 'Jane Cooper', 'email' => 'jane@example.com', 'source' => 'Facebook Ads', 'status' => 'Qualified', 'created_at' => '2023-09-21'],
            ['name' => 'John Doe', 'email' => 'john@example.com', 'source' => 'Facebook Page', 'status' => 'New', 'created_at' => '2023-09-20'],
            ['name' => 'Alice Smith', 'email' => 'alice@example.com', 'source' => 'Instagram', 'status' => 'Contacted', 'created_at' => '2023-09-19'],
        ];
    }

    public function render()
    {
        return view('livewire.facebook-leads-dashboard');
    }

    public function syncFacebookLeads()
    {
        // Implement the logic to sync leads from Facebook
        // This is a placeholder for the actual implementation
        $this->totalLeads += 10;
        $this->emit('leadsUpdated');
    }
}
