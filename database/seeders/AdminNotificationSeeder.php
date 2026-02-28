<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\AdminNotification;
use App\Models\Donation;
use App\Models\VolunteerApplication;

class AdminNotificationSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing data so we always get fresh notifications
        AdminNotification::truncate();

        $this->command->info('Seeding notifications from existing records...');

        // ── Donations ──────────────────────────────────────
        $donations = Donation::orderBy('created_at', 'desc')->limit(20)->get();
        foreach ($donations as $d) {
            $isVerified = $d->status === 'verified';
            $isRejected = $d->status === 'rejected';

            if ($isVerified) {
                AdminNotification::create([
                    'type'       => 'donation',
                    'title'      => 'Donation Verified',
                    'message'    => "৳{$d->amount} donation from {$d->donor_name} has been verified",
                    'icon'       => 'feather-check-circle',
                    'icon_color' => 'success',
                    'link'       => route('admin.donations.show', $d->id),
                    'is_read'    => false,
                    'created_at' => $d->updated_at ?? $d->created_at ?? now(),
                    'updated_at' => $d->updated_at ?? $d->created_at ?? now(),
                ]);
            } elseif ($isRejected) {
                AdminNotification::create([
                    'type'       => 'donation',
                    'title'      => 'Donation Rejected',
                    'message'    => "৳{$d->amount} donation from {$d->donor_name} has been rejected",
                    'icon'       => 'feather-x-circle',
                    'icon_color' => 'danger',
                    'link'       => route('admin.donations.show', $d->id),
                    'is_read'    => false,
                    'created_at' => $d->updated_at ?? $d->created_at ?? now(),
                    'updated_at' => $d->updated_at ?? $d->created_at ?? now(),
                ]);
            } else {
                AdminNotification::create([
                    'type'       => 'donation',
                    'title'      => 'New Donation Received',
                    'message'    => "Pending donation of ৳{$d->amount} from {$d->donor_name}",
                    'icon'       => 'feather-dollar-sign',
                    'icon_color' => 'success',
                    'link'       => route('admin.donations.show', $d->id),
                    'is_read'    => false,
                    'created_at' => $d->created_at ?? now(),
                    'updated_at' => $d->created_at ?? now(),
                ]);
            }
        }

        // ── Volunteer Applications ─────────────────────────
        $volunteers = VolunteerApplication::orderBy('created_at', 'desc')->limit(20)->get();
        foreach ($volunteers as $v) {
            AdminNotification::create([
                'type'       => 'volunteer',
                'title'      => 'New Volunteer Application',
                'message'    => ($v->name ?? 'Someone') . ' submitted a volunteer application',
                'icon'       => 'feather-users',
                'icon_color' => 'info',
                'link'       => route('admin.volunteer_applications.show', $v->id),
                'is_read'    => false,
                'created_at' => $v->created_at ?? now(),
                'updated_at' => $v->created_at ?? now(),
            ]);
        }

        // ── Contact Messages ───────────────────────────────
        $messages = DB::table('messages')->orderByDesc('id')->limit(20)->get();
        foreach ($messages as $m) {
            AdminNotification::create([
                'type'       => 'message',
                'title'      => 'New Message Received',
                'message'    => ($m->name ?? 'Someone') . ' sent a new message',
                'icon'       => 'feather-mail',
                'icon_color' => 'primary',
                'link'       => route('message.index'),
                'is_read'    => false,
                'created_at' => $m->created_at ?? now(),
                'updated_at' => $m->created_at ?? now(),
            ]);
        }

        $total = AdminNotification::count();
        $this->command->info("Done! Created {$total} notifications.");
    }
}
