@extends('layouts.index')

@section('description')
{{ mb_strimwidth($resume->description, 0, 100, '...') }}
@endsection

@section('author')
{{ $user->name }}
@endsection

@section('keywords')
{{ implode(', ', $user->skills->pluck('skill')->all()) }}
@endsection

@section('title')
{{ $resume->slag }}
@endsection

@section('content')
<div class="wrapper">
    <div class="sidebar-wrapper">
        <div class="profile-container">
            <img class="profile" src="{!! $user->profile->photo !!}" alt="{{$user->name}}"/>
            <h1 class="name">{{ $user->name }}</h1>
            <h3 class="tagline">{{ $resume->job_title }}</h3>
        </div><!--//profile-container-->

        <div class="contact-container container-block">
            <ul class="list-unstyled contact-list">
                <li class="email"><i class="fa fa-envelope"></i><a href="mailto:{{$user->email}}" target="_blank">{{ $user->email }}</a></li>
                <li class="phone"><i class="fa fa-phone"></i><a href="tel:{{$user->phone}}" target="_blank"> {{ $user->phone }}</a></li>
                @if (isset($user->profile->web_site))
                    <li class="website"><i class="fa fa-globe"></i><a href="https://www.{{$user->profile->web_site}}" target="_blank"> {{ $user->profile->web_site }}</a></li>
                @endif
                @if (isset($user->profile->linkedin))
                    <li class="linkedin"><i class="fab fa-linkedin"></i><a href="https://www.{{$user->profile->linkedin}}" target="_blank"> {{ $user->profile->linkedin }} </a></li>
                @endif
                @if (isset($user->profile->git))
                    <li class="github"><i class="fab fa-github"></i> <a href="https://www.{{$user->profile->git}}" target="_blank">{{ $user->profile->git }}</a></li>
                @endif
                @if (isset($user->profile->dribbble))
                    <li class="dribbble"><i class="fab fa-dribbble"></i><a href="https://www.{{$user->profile->dribbble}}" target="_blank"> {{ $user->profile->dribbble }}</a></li>
                @endif
                @if (isset($user->profile->behance))
                    <li class="behance"><i class="fab fa-behance"></i><a href="https://www.{{$user->profile->behance}}" target="_blank"> {{ $user->profile->behance }}</a></li>
                @endif
            </ul>
        </div><!--//contact-container-->
        <div class="education-container container-block">
            <h2 class="container-block-title">Education</h2>
            @foreach($user->educations as $education)
                <div class="item">
                    <h5 class="meta">{{ $education->university }}</h5>
                    <h5 class="meta-level-education">{{ $education->level }}</h5>
                    <h4 class="degree">{{ $education->professi }}</h4>
                    <div class="time">{{ $education->start }} - {{ $education->finish ? $education->finish : 'By current time' }}</div>
                </div><!--//item-->
            @endforeach
        </div><!--//education-container-->

        <div class="languages-container container-block">
            <h2 class="container-block-title">Languages</h2>
            <ul class="list-unstyled interests-list">
                @foreach($user->languages as $lenguage)
                    <li>
                        {{ $lenguage->lenguage }} <span class="lang-desc">( {{ $lenguage->level->level }} )</span>
                    </li>
                @endforeach
            </ul>
        </div><!--//interests-->

        @if (!empty(implode($user->hobbis->pluck('hobbi')->all())))
            <div class="interests-container container-block">
                <h2 class="container-block-title">Interests</h2>
                <ul class="list-unstyled interests-list">
                    @foreach($user->hobbis as $hobbi)
                        <li>
                            {{ $hobbi->hobbi }}
                        </li>
                    @endforeach
                </ul>
            </div><!--//interests-->
        @endif
    </div><!--//sidebar-wrapper-->

    <div class="main-wrapper">
        <section class="section summary-section">
            <h2 class="section-title"><i class="fa fa-user"></i>Career Profile</h2>
                <div class="summary">
                    {!! $resume->description !!}
                </div><!--//summary-->
        </section><!--//section-->

        <section class="section experiences-section">
            <h2 class="section-title"><i class="fa fa-briefcase"></i>Experiences</h2>

            @foreach($user->works as $item)
                <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="company">{{ $item->experience }}</h3>
                            <div class="job-title">{{ $item->position }}</div>
                        </div><!--//upper-row-->
                        <div class="time">{{ $item->start }} - {{ $item->finish ? $item->finish : 'By current time' }}</div>
                    </div><!--//meta-->
                    <div class="details">
                        {!! $item->functions !!}
                    </div><!--//details-->
                        </div><!--//item-->
            @endforeach
        </section><!--//section-->

        @if(!empty($user->projects->description))
            <section class="section projects-section">
                <h2 class="section-title"><i class="fa fa-archive"></i>Projects</h2>
                <div class="intro">
                    {!! $user->projects->description !!}
                </div><!--//intro-->
            </section><!--//section-->
        @endif

        <section class="skills-section section">
            <h2 class="section-title"><i class="fa fa-rocket"></i>Skills &amp; Proficiency</h2>
            <div class="skillset">
                @foreach($user->skills as $skill)
                    <div class="item">
                        <h3 class="level-title" style="float: left; width: 30%;">{{ $skill->skill }}</h3>
                        <div class="level-bar" style="margin-left: 30%; margin-top: -20px;">
                            <div class="level-bar-inner" style="width: {{ ($skill->level_id)*20 }}%;">
                                    {{ ($skill->level_id)*20 }}%
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section><!--//skills-section-->

    </div><!--//main-body-->
</div>
@endsection

