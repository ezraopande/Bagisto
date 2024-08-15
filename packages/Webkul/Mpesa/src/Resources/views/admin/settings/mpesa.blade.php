@extends('admin::layouts.content')

@section('page_title')
    MPESA Settings
@endsection

@section('content')
    <div class="content">
        <form method="POST" action="{{ route('admin.mpesa.settings') }}">
            @csrf
            <div class="form-group">
                <label>Consumer Key</label>
                <input type="text" name="consumer_key" value="{{ config('mpesa.consumer_key') }}" class="control" required>
            </div>
            <div class="form-group">
                <label>Consumer Secret</label>
                <input type="text" name="consumer_secret" value="{{ config('mpesa.consumer_secret') }}" class="control" required>
            </div>
            <div class="form-group">
                <label>Shortcode</label>
                <input type="text" name="shortcode" value="{{ config('mpesa.shortcode') }}" class="control" required>
            </div>
            <div class="form-group">
                <label>Callback URL</label>
                <input type="text" name="callback_url" value="{{ config('mpesa.callback_url') }}" class="control" required>
            </div>
            <div class="form-group">
                <label>Environment</label>
                <select name="environment" class="control" required>
                    <option value="sandbox" {{ config('mpesa.environment') == 'sandbox' ? 'selected' : '' }}>Sandbox</option>
                    <option value="live" {{ config('mpesa.environment') == 'live' ? 'selected' : '' }}>Live</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
