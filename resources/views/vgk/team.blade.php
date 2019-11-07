<h2 class="text-4xl">Team Info</h2>
<div class="p-6">
    <ul>
        <li>Location: {{ $team->locationName }}</li>
        <li>First Year of Play: {{ $team->firstYearOfPlay }}</li>
        <li>Division: {{ $team->division->name }} ({{ $team->division->nameShort }})</li>
        <li>Conference: {{ $team->conference->name }}</li>
        <li>Franchise: {{ $team->franchise->teamName }}</li>
        <li>Website Url: <a href="{{ $team->officialSiteUrl }}">{{ $team->officialSiteUrl }}</a></li>
    </ul>
</div>



