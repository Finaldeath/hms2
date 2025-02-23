<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Permissions
    |--------------------------------------------------------------------------
    |
    | The permission strings for HMS
    |
    */
    'permissions' => [
        'profile.view.self',
        'profile.view.limited',
        'profile.view.all',
        'role.view.all',
        'role.edit.all',
        'role.grant.all',
        'role.grant.team',
        'profile.edit.self',
        'profile.edit.limited',
        'profile.edit.all',
        'accessCodes.view',
        'meta.view',
        'meta.edit',
        'contentBlock.view',
        'contentBlock.edit',
        'membership.approval',
        'membership.updateDetails',
        'membership.banMember',
        'link.view',
        'link.create',
        'link.edit',
        'labelTemplate.view',
        'labelTemplate.create',
        'labelTemplate.edit',
        'labelTemplate.print',
        'search.users',
        'search.invites',
        'project.create.self',
        'project.create.all',
        'project.view.self',
        'project.view.all',
        'project.edit.self',
        'project.edit.all',
        'project.printLabel.self',
        'project.printLabel.all',
        'box.buy.self',
        'box.issue.all',
        'box.view.self',
        'box.view.all',
        'box.edit.self',
        'box.edit.all',
        'box.printLabel.self',
        'box.printLabel.all',
        'bankTransactions.upload',   // used by oauth client
        'snackspace.debt.view',
        'snackspace.transaction.view.self',
        'snackspace.transaction.view.all',
        'snackspace.transaction.create.all', // Trustees, finance and snackspace team can create manual transactions
        'snackspace.purchase',              // Can buy stuff either vend or chargeable tool
        'snackspace.purchase.creditOnly',   // Can buy stuff either vend or chargeable tool but only if there in credit (ex members)
        'snackspace.payment',               // can make a payment
        'snackspace.payment.debtOnly',      // can make a payment but only if there in debt (ex members)
        'snackspace.product.view',
        'snackspace.product.edit',
        'snackspace.vendingMachine.view',
        'snackspace.vendingMachine.edit',
        'snackspace.vendingMachine.locations.assign',
        'snackspace.vendingMachine.reconcile',   // reconcile jam (mostly for not acceptor)
        'rfidTags.view.self',
        'rfidTags.view.all',
        'rfidTags.edit.self',
        'rfidTags.edit.all',
        'rfidTags.destroy',
        'pins.view.all',
        'pins.view.self',
        'pins.reactivate',
        'login.shell',
        'login.spacenet',
        'bank.view',
        'bank.create',
        'bank.edit',
        'bankTransactions.view.self',
        'bankTransactions.view.limited',
        'bankTransactions.view.all',
        'bankTransactions.edit',            // can on MANUAL or CASH Banks create or edit a transaction
        'bankTransactions.ofxUpload',       // can on AUTOMATIC Banks upload an OFX file
        'bankTransactions.reconcile',       // can only match a BankTransaction to an Account (ref) or Snackspace
        'tools.view',                       // can view tools
        'tools.create',                     // can add a new tool to the system
        'tools.edit',                       // can edit details of all tools
        'tools.destroy',                    // can remove a tool
        'tools.maintainer.grant',           // trustees can grant and revoke maintainer roles on all tools from hms
        'tools.inductor.grant',             // trustees can grant and revoke inductor roles on all tools from hms
        'tools.user.grant',                 // trustees can grant and revoke user roles on all tools from hms
        'tools.use',                        // can use a tool, if tool is restricted also needs 'tools._TOOL_PERMISSION_NAME_.use'
        'tools.book',                       // can make a tool booking, , if tool is restricted also needs 'tools._TOOL_PERMISSION_NAME_.book'
        'tools.beInducted',                 // can be inducted to use a tool
        'tools.search.users',               // assigend to tool sepcfic mainter roles, allows search user for inductor.grant
        'tools.addFreeTime',                // can give a user free time to use on a tool

        'gatekeeper.access.manage',                 // can manage the access state to a building, the global self booking settings and bookable areas
        'gatekeeper.temporaryAccess.view.self',          // can view (if enabled) the access calendar, but all but own bookings will be anonymized
        'gatekeeper.temporaryAccess.view.all',     // can view all deatils about any booking
        'gatekeeper.temporaryAccess.grant.self',    // can book/request own access to the space (if building is SELF_BOOK or REQUESTED_BOOK)
        'gatekeeper.temporaryAccess.grant.all',         // can book for others and grant/revoke resuests
        'gatekeeper.temporaryAccess.restrict',      // can restrict a user from making a booking/request

        'gatekeeper.zoneEntry.upstairs',    // these are hard coded here for now, until we have a GatekeeperManager to generate them
        'gatekeeper.zoneEntry.cncBlueRoom',
        'gatekeeper.zoneEntry.classRoomMetalworking',
        'gatekeeper.zoneEntry.teamStorage',
        'gatekeeper.zoneEntry.downstairsMembersStorage',
        'gatekeeper.zoneEntry.outside',
        'horizon.view',
        'telescope.view',
        'logViewer.view',
        'team.view',
        'team.edit.description',
        'team.create',
        'email.allMembers',
        'instrumentation.electric.addReading',
        'governance.meeting.view',              // can view a meeting and its Attendees, Proxies, Absentees
        'governance.meeting.create',            // can schedule a meeting
        'governance.meeting.edit',              // can update a meeting
        'governance.meeting.checkIn',           // can Check-in Attendees to a meeting
        'governance.meeting.recordAbsence',     // can record an absence for a meeting
        'governance.voting.canVote',            // is eligible to vote at AGM or trustee elections
        'governance.proxy.designateProxy',      // is eligible to pass on there vote to a proxy
        'governance.proxy.representPrincipal',  // is eligible to act as proxy for another
    ],

    /*
    |--------------------------------------------------------------------------
    | Roles
    |--------------------------------------------------------------------------
    |
    | Default roles and the permissions to go with them
    |
    */
    'roles' => [
        'member.approval' => [
            'name' => 'Awaiting Approval',
            'description' => 'Member awaiting approval',
            'permissions' => [
                'profile.view.self',
                'profile.edit.self',
                'link.view',
                'membership.updateDetails',
                'team.view',
            ],
        ],
        'member.payment' => [
            'name' => 'Awaiting Payment',
            'description' => 'Awaiting standing order payment',
            'permissions' => [
                'profile.view.self',
                'profile.edit.self',
                'link.view',
                'team.view',
                'bankTransactions.view.self',
            ],
        ],
        'member.young' => [
            'name' => 'Young Hacker',
            'description' => 'Member between 16 and 18',
            'permissions' => [
                'profile.view.self',
                'profile.edit.self',
                'accessCodes.view',
                'link.view',
                'project.create.self',
                'project.view.self',
                'project.edit.self',
                'project.printLabel.self',
                'box.buy.self',
                'box.view.self',
                'box.edit.self',
                'box.printLabel.self',
                'bankTransactions.view.self',
                'snackspace.transaction.view.self',
                'snackspace.purchase',
                'snackspace.payment',
                'rfidTags.view.self',
                'rfidTags.edit.self',
                'tools.view',
                'tools.use',
                'tools.book',
                'tools.beInducted',
                'gatekeeper.temporaryAccess.view.self',
                'gatekeeper.temporaryAccess.grant.self',
                'gatekeeper.zoneEntry.outside',
                'gatekeeper.zoneEntry.upstairs',
                'gatekeeper.zoneEntry.cncBlueRoom',
                'gatekeeper.zoneEntry.classRoomMetalworking',
                'gatekeeper.zoneEntry.downstairsMembersStorage',
                'login.shell',
                'login.spacenet',
                'team.view',
            ],
        ],
        'member.ex' => [
            'name' => 'Ex Member',
            'description' => 'Ex Member',
            'permissions' => [
                'profile.view.self',
                'profile.edit.self',
                'link.view',
                'bankTransactions.view.self',
                'snackspace.transaction.view.self',
                'snackspace.purchase.creditOnly',
                'snackspace.payment.debtOnly',
                'rfidTags.view.self',
                'gatekeeper.zoneEntry.outside',
                'team.view',
            ],
        ],
        'member.current' => [
            'name' => 'Current Member',
            'description' => 'Current Member',
            'permissions' => [
                'profile.view.self',
                'profile.edit.self',
                'accessCodes.view',
                'link.view',
                'project.create.self',
                'project.view.self',
                'project.edit.self',
                'project.printLabel.self',
                'box.buy.self',
                'box.view.self',
                'box.edit.self',
                'box.printLabel.self',
                'bankTransactions.view.self',
                'snackspace.transaction.view.self',
                'snackspace.purchase',
                'snackspace.payment',
                'rfidTags.view.self',
                'rfidTags.edit.self',
                'tools.view',
                'tools.use',
                'tools.book',
                'tools.beInducted',
                'gatekeeper.temporaryAccess.view.self',
                'gatekeeper.temporaryAccess.grant.self',
                'gatekeeper.zoneEntry.outside',
                'gatekeeper.zoneEntry.upstairs',
                'gatekeeper.zoneEntry.cncBlueRoom',
                'gatekeeper.zoneEntry.classRoomMetalworking',
                'gatekeeper.zoneEntry.downstairsMembersStorage',
                'login.shell',
                'login.spacenet',
                'team.view',
                'governance.voting.canVote',
                'governance.proxy.designateProxy',
                'governance.proxy.representPrincipal',
                'pins.view.self',
            ],
        ],
        'member.temporarybanned' => [
            'name' => 'Temporary Banned Member',
            'description' => 'Temporary Banned Member',
            'retained' => true,
            'permissions' => [
                'profile.view.self',
                'link.view',
                'project.view.self',
                'box.view.self',
                'bankTransactions.view.self',
                'snackspace.transaction.view.self',
                'rfidTags.view.self',
                'gatekeeper.zoneEntry.outside',
                'team.view',
            ],
        ],
        'member.banned' => [
            'name' => 'Banned Member',
            'description' => 'Banned Member',
            'retained' => true,
            'permissions' => [
                'profile.view.self',
                'link.view',
                'project.view.self',
                'box.view.self',
                'bankTransactions.view.self',
                'snackspace.transaction.view.self',
                'rfidTags.view.self',
                'gatekeeper.zoneEntry.outside',
                'team.view',
            ],
        ],
        'user.super' => [
            'name' => 'Super User',
            'description' => 'Full access to all parts of the system',
            'permissions' => [
                '*',
            ],
        ],
        'user.temporaryAccess' => [
            'name' => 'Temporary Gatekeeper Access',
            'description' => 'Temporary access rights',
            'permissions' => [
                'gatekeeper.zoneEntry.upstairs',
                'gatekeeper.zoneEntry.cncBlueRoom',
                'gatekeeper.zoneEntry.classRoomMetalworking',
                'gatekeeper.zoneEntry.downstairsMembersStorage',
                'gatekeeper.zoneEntry.outside',
            ],
        ],
        'user.buildingAccess' => [
            'name' => 'Building Access User',
            'description' => 'Non members with 24/7 building access. e.g. Landlord, Cleaners',
            'permissions' => [
                'profile.view.self',
                'profile.edit.self',
                'accessCodes.view',
                'link.view',
                'gatekeeper.zoneEntry.upstairs',
                'gatekeeper.zoneEntry.cncBlueRoom',
                'gatekeeper.zoneEntry.classRoomMetalworking',
                'gatekeeper.zoneEntry.downstairsMembersStorage',
                'gatekeeper.zoneEntry.outside',
            ],
        ],
        'team.membership' => [
            'name' => 'Membership Team',
            'description' => 'Membership Team',
            'email' => 'membership@nottinghack.org.uk',
            'slackChannel' => '#membership',
            'permissions' => [
                'profile.view.limited',
                'profile.edit.limited',
                'contentBlock.view',
                'contentBlock.edit',
                'membership.approval',
                'search.users',
                'project.view.all',
                'project.edit.all',
                'project.printLabel.all',
                'box.view.all',
                'box.edit.all',
                'box.printLabel.all',
                'snackspace.transaction.view.all',
                'rfidTags.view.self',
                'rfidTags.view.all',
                'rfidTags.edit.self',
                'rfidTags.edit.all',
                'pins.view.all',
                'pins.reactivate',
                'bankTransactions.view.limited',
                'gatekeeper.zoneEntry.teamStorage',
                'team.edit.description',
                'search.invites',
                'governance.meeting.view',
                'governance.meeting.checkIn',
            ],
        ],
        'team.trustees' => [
            'name' => 'Nottingham Hackspace Trustees',
            'description' => 'The Trustees',
            'email' => 'trustees@nottinghack.org.uk',
            'slackChannel' => '#general',
            'permissions' => [
                'profile.view.all',
                'profile.edit.all',
                'meta.view',
                'meta.edit',
                'contentBlock.view',
                'contentBlock.edit',
                'membership.approval',
                'membership.banMember',
                'search.users',
                'project.view.all',
                'project.edit.all',
                'project.printLabel.all',
                'box.issue.all',
                'box.view.all',
                'box.edit.all',
                'box.printLabel.all',
                'snackspace.transaction.view.all',
                'snackspace.transaction.create.all',
                'snackspace.product.view',
                'snackspace.product.edit',
                'snackspace.vendingMachine.view',
                'snackspace.vendingMachine.edit',
                'snackspace.vendingMachine.locations.assign',
                'snackspace.vendingMachine.reconcile',
                'rfidTags.view.self',
                'rfidTags.view.all',
                'rfidTags.edit.self',
                'rfidTags.edit.all',
                'pins.view.all',
                'pins.reactivate',
                'link.view',
                'link.create',
                'link.edit',
                'bank.view',
                'bankTransactions.view.all',
                'bankTransactions.edit',
                'bankTransactions.ofxUpload',
                'bankTransactions.reconcile',
                'tools.view',
                'tools.edit',
                'tools.maintainer.grant',
                'tools.inductor.grant',
                'tools.user.grant',
                'role.grant.team',
                'gatekeeper.zoneEntry.teamStorage',
                'team.edit.description',
                'team.create',
                'search.invites',
                'email.allMembers',
                'snackspace.debt.view',
                'governance.meeting.view',
                'governance.meeting.create',
                'governance.meeting.edit',
                'governance.meeting.checkIn',
                'governance.meeting.recordAbsence',
                'gatekeeper.access.manage',
                'gatekeeper.temporaryAccess.view.all',
                'gatekeeper.temporaryAccess.grant.all',
                'gatekeeper.temporaryAccess.restrict',
                'gatekeeper.zoneEntry.upstairs',
                'gatekeeper.zoneEntry.cncBlueRoom',
                'gatekeeper.zoneEntry.classRoomMetalworking',
                'gatekeeper.zoneEntry.downstairsMembersStorage',
                'gatekeeper.zoneEntry.outside',
                'tools.addFreeTime',
            ],
        ],
        'team.software' => [
            'name' => 'Software Team',
            'description' => 'Software Team',
            'email' => 'software@nottinghack.org.uk',
            'slackChannel' => '#software',
            'permissions' => [
                'role.view.all',
                'meta.view',
                'meta.edit',
                'contentBlock.view',
                'contentBlock.edit',
                'link.view',
                'link.create',
                'link.edit',
                'labelTemplate.view',
                'labelTemplate.create',
                'labelTemplate.edit',
                'labelTemplate.print',
                'gatekeeper.zoneEntry.teamStorage',
                'horizon.view',
                'telescope.view',
                'logViewer.view',
                'team.edit.description',
            ],
        ],
        'team.finance' => [
            'name' => 'Finance Team',
            'description' => 'Finance Team',
            'email' => 'accounts@nottinghack.org.uk',
            'permissions' => [
                'search.users',
                'profile.view.limited',
                'bank.view',
                'bank.create',
                'bank.edit',
                'bankTransactions.view.all',
                'bankTransactions.edit',
                'bankTransactions.ofxUpload',
                'bankTransactions.reconcile',
                'snackspace.debt.view',
                'snackspace.transaction.view.all',
                'snackspace.transaction.create.all',
                'gatekeeper.zoneEntry.teamStorage',
                'team.edit.description',
                'instrumentation.electric.addReading',
            ],
        ],
        'team.network' => [
            'name' => 'Network Team',
            'description' => 'Network Team',
            'email' => 'network@nottinghack.org.uk',
            'slackChannel' => '#network',
            'permissions' => [
                'meta.view',
                'meta.edit',
                'link.view',
                'link.create',
                'link.edit',
                'tools.view',
                'tools.create',
                'tools.edit',
                'tools.destroy',
                'tools.maintainer.grant',
                'tools.inductor.grant',
                'gatekeeper.zoneEntry.teamStorage',
                'horizon.view',
                'telescope.view',
                'logViewer.view',
                'team.edit.description',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Team default Permissions.
    |--------------------------------------------------------------------------
    |
    | Default permissions when creating new teams.
    |
    */
    'defaultTeamPermissions' => [
        'gatekeeper.zoneEntry.teamStorage',
        'team.edit.description',
    ],
];
