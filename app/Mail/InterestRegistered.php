<?php

namespace App\Mail;

use HMS\Entities\Role;
use HMS\Entities\Invite;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use HMS\Repositories\MetaRepository;
use HMS\Repositories\RoleRepository;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InterestRegistered extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var string
     */
    public $token;

    /**
     * @var string
     */
    public $membershipEmail;

    /**
     * @var string
     */
    public $trusteesEmail;

    /**
     * @var string
     */
    public $groupLink;

    /**
     * @var string
     */
    public $rulesHTML;

    /**
     * Create a new message instance.
     *
     * @param Invite $invite
     */
    public function __construct(Invite $invite, MetaRepository $metaRepository, RoleRepository $roleRepository)
    {
        $this->token = $invite->getInviteToken();
        $this->membershipEmail = $roleRepository->findByName(Role::TEAM_MEMBERSHIP)->getEmail();
        $this->trusteesEmail = $roleRepository->findByName(Role::TEAM_TRUSTEES)->getEmail();
        $this->groupLink = $metaRepository->get('link_Google Group');
        $this->rulesLink = $metaRepository->get('link_Hackspace Rules');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nottingham Hackspace: Interest registered')
                    ->markdown('emails.interestregistered');
    }
}
