<div class="top-inner-nav">
    <ul>
        <li><a href="{{ route('admin.job_profiles.detail', ['id'=>$job_profile->job_id]) }}">Index</a></li>

        <li><a href="{{ route('admin.job_profiles.edit', ['id'=>$job_profile->job_id]) }}">Edit</a></li>

        <li><a href="{{ route('admin.job_applications.job', ['id'=>$job_profile->job_id]) }}">View Applications</a></li>

        <li><a href="{{ route('admin.job_applications.filter', ['id'=>$job_profile->job_id]) }}">Filter Applications</a></li>
    </ul>
</div>