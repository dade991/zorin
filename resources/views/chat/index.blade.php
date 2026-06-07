@extends('layouts.app')

@section('title', 'Chat — Zorin Rice Milling')
@section('page-title', 'Chat with Staff')

@section('content')

<div class="chat-layout">
    <!-- Sidebar -->
    <div class="chat-sidebar">
        <div class="data-table-header" style="border-bottom:1px solid var(--border-light);">
            <span class="data-table-title">Conversations</span>
        </div>
        <div style="overflow-y:auto;flex:1;">
            <div class="chat-contact active">
                <div class="dash-user-avatar" style="width:36px;height:36px;font-size:0.75rem;">SM</div>
                <div style="flex:1;min-width:0;">
                    <div style="font-weight:600;font-size:0.875rem;">Support Team</div>
                    <div style="font-size:0.8125rem;color:var(--text-muted);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">How can we help you today?</div>
                </div>
            </div>
            <div class="chat-contact">
                <div class="dash-user-avatar" style="width:36px;height:36px;font-size:0.75rem;">AD</div>
                <div style="flex:1;min-width:0;">
                    <div style="font-weight:600;font-size:0.875rem;">Admin</div>
                    <div style="font-size:0.8125rem;color:var(--text-muted);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">Your booking is confirmed</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Chat -->
    <div class="chat-main">
        <div class="chat-header">
            <div class="dash-user-avatar" style="width:36px;height:36px;font-size:0.75rem;">SM</div>
            <div>
                <div style="font-weight:600;">Support Team</div>
                <div style="font-size:0.8125rem;color:var(--text-muted);">Usually replies in 5 minutes</div>
            </div>
        </div>
        
        <div class="chat-messages">
            <div class="chat-bubble received">
                Hello! Welcome to Zorin Rice Milling. How can we assist you today?
            </div>
            <div class="chat-bubble sent">
                Hi, I want to book a milling service for 500kg of paddy.
            </div>
            <div class="chat-bubble received">
                Absolutely! We can schedule that for you. Would you prefer Rice Mill A or B?
            </div>
        </div>

        <div class="chat-input-bar">
            <input type="text" class="chat-input" placeholder="Type your message...">
            <button class="btn btn-primary">
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </div>
</div>

<style>
.chat-contact {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.875rem 1rem;
    cursor: pointer;
    transition: background 0.2s;
    border-bottom: 1px solid var(--border-light);
}
.chat-contact:hover, .chat-contact.active {
    background: rgba(26, 74, 46, 0.04);
}
.chat-contact.active {
    border-left: 3px solid var(--primary-light);
}
</style>

@endsection