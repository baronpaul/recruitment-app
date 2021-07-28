@php

@endphp
<div class="sidebar">
    <ul>
        <li>
            <a href="{{ route('profile') }}">Profile</a>

            <a href="{{ route('profile.education') }}" class="<?php if($user->education == 'yes') echo 'crossed' ?>">
                Education
            </a>

            <a href="{{ route('profile.employment') }}" class="<?php if($user->employment == 'yes') echo 'crossed' ?>">
                Employment History
            </a>

            <a href="{{ route('profile.professional_associations') }}" class="<?php if($user->professional_certifications == 'yes') echo 'crossed' ?>">
                Professional Certifications
            </a>

            <a href="{{ route('profile.computer_skills') }}" class="<?php if($user->technical_skills == 'yes') echo 'crossed' ?>">
                Technical Skils
            </a>
            
            <a href="{{ route('profile.applicant_references') }}"  class="<?php if($user->applicant_references == 'yes') echo 'crossed' ?>">
                References
            </a>

            <a href="{{ route('profile.additional_info') }}"  class="<?php if($user->completed_profile == 'yes') echo 'crossed' ?>">
                Additional Info
            </a>
        </li>
    </ul>
</div>