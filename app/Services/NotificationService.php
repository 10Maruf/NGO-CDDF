<?php

namespace App\Services;

use App\Models\AdminNotification;

class NotificationService
{
    /**
     * Create a new admin notification.
     */
    public static function send(string $type, string $title, ?string $message = null, ?string $link = null, ?string $icon = null, ?string $iconColor = null): AdminNotification
    {
        $defaults = self::typeDefaults($type);

        return AdminNotification::create([
            'type'       => $type,
            'title'      => $title,
            'message'    => $message,
            'icon'       => $icon ?? $defaults['icon'],
            'icon_color' => $iconColor ?? $defaults['color'],
            'link'       => $link,
        ]);
    }

    // ── Shortcut methods ──────────────────────────────────

    /** New donation received */
    public static function newDonation(string $donorName, $amount, int $donationId): AdminNotification
    {
        return self::send(
            'donation',
            'New Donation Received',
            "Pending donation of ৳{$amount} from {$donorName}",
            route('admin.donations.show', $donationId)
        );
    }

    /** Donation verified */
    public static function donationVerified(string $donorName, $amount): AdminNotification
    {
        return self::send(
            'donation',
            'Donation Verified',
            "৳{$amount} donation from {$donorName} has been verified",
            route('admin.donations.index'),
            'feather-check-circle',
            'success'
        );
    }

    /** Donation rejected */
    public static function donationRejected(string $donorName, $amount): AdminNotification
    {
        return self::send(
            'donation',
            'Donation Rejected',
            "৳{$amount} donation from {$donorName} has been rejected",
            route('admin.donations.index'),
            'feather-x-circle',
            'danger'
        );
    }

    /** New volunteer application */
    public static function newVolunteer(string $name, int $id): AdminNotification
    {
        return self::send(
            'volunteer',
            'New Volunteer Application',
            "{$name} submitted a volunteer application",
            route('admin.volunteer_applications.show', $id)
        );
    }

    /** Volunteer status updated */
    public static function volunteerStatusUpdated(string $name, string $status): AdminNotification
    {
        $statusLabel = $status === 'approved' ? 'Approved' : 'Rejected';
        return self::send(
            'volunteer',
            "Volunteer {$statusLabel}",
            "{$name}'s application has been {$statusLabel}",
            route('admin.volunteer_applications.index'),
            $status === 'approved' ? 'feather-user-check' : 'feather-user-x',
            $status === 'approved' ? 'success' : 'danger'
        );
    }

    /** New contact message */
    public static function newMessage(string $senderName): AdminNotification
    {
        return self::send(
            'message',
            'New Message Received',
            "{$senderName} sent a new message",
            route('message.index')
        );
    }

    /** New subscriber */
    public static function newSubscriber(string $email): AdminNotification
    {
        return self::send(
            'subscriber',
            'New Subscriber',
            "{$email} subscribed to the newsletter",
            route('subscribe.all')
        );
    }

    /** New project created */
    public static function newProject(string $title): AdminNotification
    {
        return self::send(
            'project',
            'New Project Created',
            "Project \"{$title}\" has been created",
            route('project.index')
        );
    }

    /** New career posted */
    public static function newCareer(string $title): AdminNotification
    {
        return self::send(
            'career',
            'New Career Posted',
            "New job posting for \"{$title}\" has been added",
            route('careers.index')
        );
    }

    /** New publication */
    public static function newPublication(string $title): AdminNotification
    {
        return self::send(
            'publication',
            'New Publication',
            "Publication \"{$title}\" has been added",
            route('publications.index')
        );
    }

    /** New contact form submission */
    public static function newContact(string $name): AdminNotification
    {
        return self::send(
            'contact',
            'New Contact Submission',
            "{$name} submitted the contact form",
            route('contact.index')
        );
    }

    /** Custom / system notification */
    public static function system(string $title, ?string $message = null, ?string $link = null): AdminNotification
    {
        return self::send('system', $title, $message, $link, 'feather-alert-triangle', 'danger');
    }

    // ── Defaults per type ─────────────────────────────────

    protected static function typeDefaults(string $type): array
    {
        $map = [
            'donation'    => ['icon' => 'feather-dollar-sign', 'color' => 'success'],
            'volunteer'   => ['icon' => 'feather-users',       'color' => 'info'],
            'message'     => ['icon' => 'feather-mail',        'color' => 'primary'],
            'subscriber'  => ['icon' => 'feather-user-plus',   'color' => 'warning'],
            'contact'     => ['icon' => 'feather-phone',       'color' => 'primary'],
            'project'     => ['icon' => 'feather-folder',      'color' => 'secondary'],
            'career'      => ['icon' => 'feather-briefcase',   'color' => 'dark'],
            'publication' => ['icon' => 'feather-book',        'color' => 'dark'],
            'system'      => ['icon' => 'feather-alert-triangle', 'color' => 'danger'],
        ];

        return $map[$type] ?? ['icon' => 'feather-bell', 'color' => 'primary'];
    }
}
