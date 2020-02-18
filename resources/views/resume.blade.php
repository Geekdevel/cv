@extends('layouts.index')

@section('description')
{{ mb_strimwidth($resume->description, 0, 100, '...') }}
@endsection

@section('author')
{{ $resume->user->name }}
@endsection

@section('keywords')
{{ implode(', ', $resume->user->skills->pluck('skill')->all()) }}
@endsection

@section('title')
{{ $resume->slug }}
@endsection

@section('content')
<div class="wrapper">
    <div class="sidebar-wrapper">
        <div class="profile-container">
            <img class="profile" src="{!! $resume->user->profile->photo !!}" alt="{{$resume->user->name}}"/>
            <h1 class="name">{{ $resume->user->name }}</h1>
            <h3 class="tagline">{{ $resume->job_title }}</h3>
        </div>

        <div class="contact-container container-block">
            <ul class="list-unstyled contact-list">
                <li class="email"><i class="fa fa-envelope"></i><a href="mailto:{{$resume->user->email}}" target="_blank">{{ $resume->user->email }}</a></li>
                <li class="phone"><i class="fa fa-phone"></i><a href="tel:{{$resume->user->phone}}" target="_blank"> {{ $resume->user->phone }}</a></li>
                @if (isset($resume->user->profile->web_site))
                    <li class="website"><i class="fa fa-globe"></i><a href="http://{{$resume->user->profile->web_site}}" target="_blank"> {{ $resume->user->profile->web_site }}</a></li>
                @endif
                @if (isset($user->profile->linkedin))
                    <li class="linkedin"><i class="fab fa-linkedin"></i><a href="http://{{$resume->user->profile->linkedin}}" target="_blank"> {{ $resume->user->profile->linkedin }} </a></li>
                @endif
                @if (isset($resume->user->profile->git))
                    <li class="github"><i class="fab fa-github"></i> <a href="http://{{$resume->user->profile->git}}" target="_blank">{{ $resume->user->profile->git }}</a></li>
                @endif
                @if (isset($resume->user->profile->dribbble))
                    <li class="dribbble"><i class="fab fa-dribbble"></i><a href="http://{{$resume->user->profile->dribbble}}" target="_blank"> {{ $resume->user->profile->dribbble }}</a></li>
                @endif
                @if (isset($resume->user->profile->behance))
                    <li class="behance"><i class="fab fa-behance"></i><a href="http://{{$resume->user->profile->behance}}" target="_blank"> {{ $resume->user->profile->behance }}</a></li>
                @endif
            </ul>
        </div>
        <div class="education-container container-block">
            <h2 class="container-block-title">Education</h2>
            @foreach($resume->user->education as $education)
                <div class="item">
                    <h5 class="meta">{{ $education->university }}</h5>
                    <h5 class="meta-level-education">{{ $education->degree }}</h5>
                    <h4 class="degree">{{ $education->specialty }}</h4>
                    <div class="time">{{ $education->start }} - {{ $education->finish ? $education->finish : 'By current time' }}</div>
                </div>
            @endforeach
        </div>

        <div class="languages-container container-block">
            <h2 class="container-block-title">Languages</h2>
            <ul class="list-unstyled interests-list">
                @foreach($resume->user->languages as $lenguage)
                    <li>
                        {{ $lenguage->lenguage }} <span class="lang-desc">( {{ $lenguage->level->level }} )</span>
                    </li>
                @endforeach
            </ul>
        </div>

        @if (!empty(implode($resume->user->hobbies->pluck('hobby')->all())))
            <div class="interests-container container-block">
                <h2 class="container-block-title">Interests</h2>
                <ul class="list-unstyled interests-list">
                    @foreach($resume->user->hobbies as $hobby)
                        <li>
                            {{ $hobby->hobby }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="main-wrapper">
        <section class="section summary-section">
            <h2 class="section-title"><i class="fa fa-user"></i>Career Profile</h2>
                <div class="summary">
                    {!! $resume->description !!}
                </div>
        </section>

        <section class="section experiences-section">
            <h2 class="section-title"><i class="fa fa-briefcase"></i>Experiences</h2>

            @foreach($resume->user->experiences as $item)
                <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="company">{{ $item->company }}</h3>
                            <div class="job-title">{{ $item->position }}</div>
                        </div>
                        <div class="time">{{ $item->start }} - {{ $item->finish ? $item->finish : 'By current time' }}</div>
                    </div>
                    <div class="details">
                        {!! $item->functions !!}
                    </div>
                        </div>
            @endforeach
        </section>

        @if(!empty($resume->user->projects->description))
            <section class="section projects-section">
                <h2 class="section-title"><i class="fa fa-archive"></i>Projects</h2>
                <div class="intro">
                    {!! $resume->user->projects->description !!}
                </div>
            </section>
        @endif

        <section class="skills-section section">
            <h2 class="section-title"><i class="fa fa-rocket"></i>Skills &amp; Proficiency</h2>
            <div class="skillset">
                @foreach($resume->user->skills as $skill)
                    <div class="item">
                        <h3 class="level-title public-resume-blade-level-title">{{ $skill->skill }}</h3>
                        <div class="level-bar public-resume-blade-level-bar">
                            <div class="level-bar-inner" style="width: {{ ($skill->level_id)*20 }}%;">
                                    {{ ($skill->level_id)*20 }}%
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

    </div>
</div>
@endsection

