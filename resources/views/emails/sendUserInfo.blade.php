@component('mail::message')
# User Information

<p>Hello Admin,</p>
<br>
<p><b>Name </b> {{ $details['user_name'] }}</p>
<p><b>Email </b> {{ $details['email_id'] }}</p>
<p><b>Company </b> {{ $details['company_name'] }}</p>
<p><b>Phone No. </b> {{ $details['mobile_no'] }}</p>
@isset($details['carbon'])
<p><b>Carbon </b> {{ $details['carbon'] }}</p>
@endisset
@isset($details['business_type'])
<p><b>Business Type </b> {{ $details['business_type'] }}</p>
@endisset
@isset($details['sub_software_service'])
<p><b>Business Service </b> {{ ($details['sub_software_service']) }}</p>
@endisset
@isset($details['carbon_offset'])
<p><b>Business Service charges </b> {{ ($details['carbon_offset']) }}</p>
@endisset
@isset($details['sq_foot'])
<p><b>Square Foot </b> {{ $details['sq_foot'] }}</p>
@endisset
@isset($details['locationdetail'])
<p><b>Location </b> {{ $details['locationdetail'] }}</p>
@endisset
@isset($details['employee'])
@if($details['employee'] != 0)
<p><b>Employee </b> {{ $details['employee'] }}</p>
@endif
@endisset

<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
