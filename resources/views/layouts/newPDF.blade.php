<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resume {{$user->name}}</title>
    {{-- <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> --}}
 <style>
@font-face {
    font-family: 'Roboto';
    src: url({{ storage_path('fonts\Roboto\Roboto-Light.ttf') }}) format("truetype");
    font-weight: 400;
    font-style: normal;
}
body {
  /*font-family: 'Nunito';*/
  font-family: 'Roboto';
  color: #545E6C;
  background: #f5f5f5;
  font-size: 14px;
  padding: 0px;
  /*-webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;*/
}
h1,
h2,
h3,
h4,
h5,
h6 {
  font-weight: 700;
  font-family: 'Roboto';
}
p {
  line-height: 1.5;
}
li {
    list-style-type: none;
}
.wrapper {
    margin: 0 auto;
}
.sidebar-wrapper {
    /*font-family: 'Roboto', sans-serif;*/
    background: #42A8C0;
    display: block;
    float: right;
    right: 0;
    width: 300px;
    color: #fff;
    height: 100%;
}
.sidebar-wrapper li {
    margin-left: -35px;
}
.main-wrapper {
    display: block;
    float: left;
    width: 370px;
    margin-top: 0px;
}
/*.upper-row {
   margin-bottom: -50px;
}*/
.main-wrapper .time {
    color: #97AAC3;
}
.main-wrapper .company {
    color: #97AAC3;
    /*margin-top: 50px;*/
}
.profile-container {
    padding: 10px;
    background: rgba(0, 0, 0, 0.2);
    text-align: center;
    color: #fff;
}
.fa-li {
    width: 18px;
}
.fa-title {
    width: 60px;
    margin-top: 20px;
}
.profile {
    width: 150px;
    border-radius: 75px;
    margin: 0px 25% 0px 25%;
}
.container-block {
    padding-left: 10px;
    padding-right: 10px;
}
.section-title {
  text-transform: uppercase;
  font-size: 20px;
  font-weight: 500;
  color: #2d7788;
  margin-top: 0;
  margin-bottom: 20px;
  height: 32px;
}
.summary {
    padding-top: 20px;
}
.item-exp {
    padding-top: 20px;
}
.job-title {
    display: block;
    float: left;
}
.time {
    display: block;
    float: right;
    margin-right: 0px;
    right: 0;
}
.intro {
    padding-top: 20px;
}
.skillset {
    padding-top: 20px;
}
.level-title {
    width: 30%;
    font-size: 14px;
    /*display: block;
    float: left;*/
}
.level-bar {
    margin-left: 30%;
    /*display: block;
    float: right;*/
}
.level-bar-inner {
    background-color: #42A8C0;
    height: 20px;
    margin-top: -40px;
}
.skill-level-procent {
    padding-bottom: 5px;
}
/*.level-bar-inner span {
    margin-bottom: 5px;
}*/
.container-block {
    padding-left: 15px;
}
.sidebar-wrapper .name {
    font-size: 32px;
    font-weight: 900;
    margin-top: 0;
    margin-bottom: 10px;
    line-height: 1.2;
}
.container-block-title {
    text-transform: uppercase;
    font-size: 16px;
    font-weight: 700;
    /*margin-top: 0;*/
    margin-bottom: 15px;
    /*line-height: 1.2;*/
}
.container-block .meta {
    color: rgba(255, 255, 255, 0.6);
    font-weight: 500;
    font-size: 1.125rem;
    margin-top: 0;
    margin-bottom: 0;
}
.sidebar-wrapper .degree {
    font-size: 14px;
    margin-bottom: 0;
    margin-top: 5px;
    /*line-height: 1.2;*/
    font-weight: 500;
}
.lang-desc {
    color: rgba(255, 255, 255, 0.6);
}



</style>
</head>
<body>
    {{ storage_path('fonts\Roboto\Roboto-Light.ttf') }}</br>
    {{ url(asset('fonts/Roboto/Roboto-Light.ttf'))}}</br>
    <div class="wrapper">
        <div class="main-wrapper">
            <section class="section summary-section">
                <h2 class="section-title">
                    <img class="fa-title" src="{{ url('IconsFontAvesome/fas-fa-user-krug.png') }}" alt="fas-fa-user-krug">
                    {{-- <img class="fa-title" src="{{storage_path('IconsFontAvesome/fas-fa-user-krug.png')}}" alt="fas-fa-user-krug"> --}}
                    <span>Career Profile</span>
                </h2>
                <div class="summary">
                    {!! $resume->description !!}
                </div>
            </section>

            <section class="section experiences-section">
                <h2 class="section-title">
                    <img class="fa-title" src="{{ url('IconsFontAvesome/fa-briefcase-krug.png') }}" alt="fa-briefcase-krug">
                    {{-- <img class="fa-title" src="{{storage_path('IconsFontAvesome/fa-briefcase-krug.png')}}" alt="fa-briefcase-krug"> --}}
                    <span>Experiences</span>
                </h2>
                @foreach($user->works as $item)
                    <div class="item-exp">
                        <div class="meta">
                            <div class="upper-row">
                                <h3 class="job-title">{{ $item->position }}</h3>
                                <div class="time">{{ $item->start }} - {{ $item->finish ? $item->finish : 'By current time' }}</div>
                            </div><!--//upper-row-->
                            <div class="company">{{ $item->experience }}</div>
                        </div><!--//meta-->
                        <div class="details">
                            {!! $item->functions !!}
                        </div><!--//details-->
                    </div><!--//item-->
                @endforeach
            </section><!--//section-->

            @if(!empty($user->projects->description))
                <section class="section projects-section">
                    <h2 class="section-title">
                        <img class="fa-title" src="{{ url('IconsFontAvesome/fa-archive-v-krug.png') }}" alt="fa-archive-v-krug">
                        {{-- <img class="fa-title" src="{{storage_path('IconsFontAvesome/fa-archive-v-krug.png')}}" alt="fa-archive-v-krug"> --}}
                        <span>Projects</span>
                    </h2>
                    <div class="intro">
                        {!! $user->projects->description !!}
                    </div><!--//intro-->
                </section><!--//section-->
            @endif

            <section class="skills-section section">
                <h2 class="section-title">
                    <img class="fa-title" src="{{ url('IconsFontAvesome/fa-rocket-krug.png') }}" alt="fa-rocket-krug">
                    {{-- <img class="fa-title" src="{{storage_path('IconsFontAvesome/fa-rocket-krug.png')}}" alt="fa-rocket-krug"> --}}
                    <span>Skills &amp; Proficiency</span>
                </h2>
                <div class="skillset">
                    @foreach($user->skills as $skill)
                        <div class="item">
                            <h3 class="level-title">{{ $skill->skill }}</h3>
                            <div class="level-bar">
                                <div class="level-bar-inner" style="width: {{ ($skill->level_id)*20 }}%;">
                                    <span class="skill-level-procent">{{ ($skill->level_id)*20 }}%</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section><!--//skills-section-->

        </div>

        <div class="sidebar-wrapper">
            <div class="profile-container">
                <img class="profile" src="{{ url($user->profile->photo) }}" alt="{{$user->name}}"/>
                {{-- <img class="profile" src="http://resumevue3.test{{$user->profile->photo}}" alt="{{$user->name}}"/> --}}
                {{-- <img class="profile" src="{{$url}}" alt="{{$user->name}}"/> --}}
                <h1 class="name">{{ $user->name }}</h1>
                <h3 class="tagline">{{ $resume->job_title }}</h3>
            </div><!--//profile-container-->

            <div class="contact-container container-block">
                <ul class="list-unstyled contact-list">
                    <li class="email">
                        <img class="fa-li" src="{{ url('IconsFontAvesome/fa-envelope-bel.png') }}" alt="fa-envelope">
                        {{-- <img class="fa-li" src="{{storage_path('IconsFontAvesome/fa-envelope-bel.png')}}" alt="fa-envelope"> --}}
                        {{ $user->email }}
                    </li>
                    <li class="phone">
                        <img class="fa-li" src="{{ url('IconsFontAvesome/fa-phone-bel.png') }}" alt="fa-envelope">
                        {{-- <img class="fa-li" src="{{storage_path('IconsFontAvesome/fa-phone-bel.png')}}" alt="fa-envelope"> --}}
                         {{ $user->phone }}
                    </li>
                    @if (isset($user->profile->web_site))
                        <li class="website">
                            <img class="fa-li" src="{{ url('IconsFontAvesome/fa-globe-bel.png') }}" alt="fa-globe">
                            {{-- <img class="fa-li" src="{{storage_path('IconsFontAvesome/fa-globe-bel.png')}}" alt="fa-globe"> --}}
                             {{ $user->profile->web_site }}
                        </li>
                    @endif
                    @if (isset($user->profile->linkedin))
                        <li class="linkedin">
                            <img class="fa-li" src="{{ url('IconsFontAvesome/fa-linkedin-bel.png') }}" alt="fa-linkedin">
                            {{-- <img class="fa-li" src="{{storage_path('IconsFontAvesome/fa-linkedin-bel.png')}}" alt="fa-linkedin"> --}}
                             {{ $user->profile->linkedin }}
                        </li>
                    @endif
                    @if (isset($user->profile->git))
                        <li class="github">
                            <img class="fa-li" src="{{ url('IconsFontAvesome/fa-github-bel.png') }}" alt="fa-github">
                            {{-- <img class="fa-li" src="{{storage_path('IconsFontAvesome/fa-github-bel.png')}}" alt="fa-github"> --}}
                             {{ $user->profile->git }}
                        </li>
                    @endif
                    @if (isset($user->profile->dribbble))
                        <li class="dribbble">
                            <img class="fa-li" src="{{ url('IconsFontAvesome/fa-dribbble-bel.png') }}" alt="fa-dribbble">
                            {{-- <img class="fa-li" src="{{storage_path('IconsFontAvesome/fa-dribbble-bel.png')}}" alt="fa-dribbble"> --}}
                             {{ $user->profile->dribbble }}
                        </li>
                    @endif
                    @if (isset($user->profile->behance))
                        <li class="behance">
                            <img class="fa-li" src="{{ url('IconsFontAvesome/fa-behance-bel.png') }}" alt="fa-behance">
                            {{-- <img class="fa-li" src="{{storage_path('IconsFontAvesome/fa-behance-bel.png')}}" alt="fa-behance"> --}}
                             {{ $user->profile->behance }}
                        </li>
                    @endif
                </ul>
            </div><!--//contact-container-->
            <div class="education-container container-block">
                <h2 class="container-block-title">Education</h2>
                @foreach($user->educations as $education)
                    <div class="item">
                        <h4 class="degree">{{ $education->level }}</h4>
                        <h5 class="meta">{{ $education->university }}</h5>
                        <div class="time-education">{{ $education->start }} - {{ $education->finish ? $education->finish : 'By current time' }}</div>
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

    </div>
</body>
</html>









