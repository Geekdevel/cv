<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resume {{$user->name}}</title>
    {{-- <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> --}}
 <style>
@font-face {
    font-family: 'Nunito';
    src: url(fonts/Nunito_Sans/NunitoSans-Regular.ttf); /* in http://domain/publick/fonts/Roboto/Roboto-Light.ttf*/
    font-weight: 300;
    /*font-style: normal;*/
}
@font-face {
    font-family: 'Nunito';
    src: url(fonts/Nunito_Sans/NunitoSans-Regular.ttf); /* in http://domain/publick/fonts/Roboto/Roboto-Light.ttf*/
    font-weight: 400;
    /*font-style: normal;*/
}
@font-face {
    font-family: 'Nunito';
    src: url(fonts/Nunito_Sans/NunitoSans-Regular.ttf); /* in http://domain/publick/fonts/Roboto/Roboto-Light.ttf*/
    font-weight: 500;
    /*font-style: normal;*/
}
@font-face {
    font-family: 'Nunito';
    src: url(fonts/Nunito_Sans/NunitoSans-Regular.ttf); /* in http://domain/publick/fonts/Roboto/Roboto-Light.ttf*/
    font-weight: 600;
    /*font-style: normal;*/
}
@font-face {
    font-family: 'Nunito';
    src: url(fonts/Nunito_Sans/NunitoSans-Regular.ttf); /* in http://domain/publick/fonts/Roboto/Roboto-Light.ttf*/
    font-weight: 700;
    /*font-style: normal;*/
}
@font-face {
    font-family: 'Nunito';
    src: url(fonts/Nunito_Sans/NunitoSans-Regular.ttf); /* in http://domain/publick/fonts/Roboto/Roboto-Light.ttf*/
    font-weight: 900;
    /*font-style: normal;*/
}
body {
  /*font-family: 'Nunito';*/
  font-family: 'Nunito';
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
  font-family: 'Nunito';
  font-weight: 700;
}
.section-title {
  font-family: 'Nunito' !important;
  text-transform: uppercase;
  font-size: 20px;
  font-weight: 500;
  color: #2d7788;
}
/*p {
  line-height: 1.5;
}*/
li {
    list-style-type: none;
}
p {
  line-height: 1.5;
}
/* image fa*/
.fa-title {
  width: 60px;
  margin-top: 20px;
}
.fa-li {
    width: 18px;
}
/* end image fa*/
/* title section*/
.section {
  /*background: red;*/
}
.section-title {
  margin-top: 0;
  padding-top: 0;
}
.profile {
    width: 150px;
    border-radius: 75px;
    margin: 0px 25% 0px 25%;
}
/* end title section*/
.wrapper {
    margin: 0 auto;
    padding: 0;
    /*position: relative;*/
    /*background: red;*/
    /*height: 100%;*/
    /*display: flex;
    flex-direction: row;*/
}
.main-wrapper {
  width: 370px;
  height: 99%;
  /*left: 0;*/
  /*position: absolute;*/
  float: left;
  display: block;
  /*background: green;*/
}
.sidebar-wrapper {
  width: 320px;
  height: 99%;
  background: #42A8C0;
  /*right: 0;*/
 /* position: absolute;*/
  float: right;
  display: block;
  color: #fff;
}
.profile-container {
  padding: 10px;
  background: rgba(0, 0, 0, 0.2);
  text-align: center;
  color: #fff;
}
.tagline {
  margin-top: 0;
}
.contact-list {
  /*background: green;*/
  margin: 0;
  padding-left: 0;
}
.sidebar-wrapper .name {
  font-size: 32px;
  font-weight: 900;
  margin-top: 0;
  margin-bottom: 5px;
}
.container-block {
  /*background: green;*/
  padding-left: 20px;
}
.container-block-title {
  text-transform: uppercase;
  font-size: 16px;
  font-weight: 700;
  margin-top: 10px;
  /*margin-top: 20px;*/
  margin-bottom: 5px;
}
.sidebar-wrapper .degree {
  font-size: 14px;
  margin-top: 0;
  margin-bottom: 5px;
}
.sidebar-wrapper .education-container .item {
  margin-bottom: 15px;
  /*background: green;*/
}
.sidebar-wrapper .education-container .item:last-child {
  margin-bottom: 0;
  /*background: green;*/
}
.sidebar-wrapper .education-container .meta {
  color: rgba(255, 255, 255, 0.6);
  font-weight: 500;
  margin-bottom: 0px;
  margin-top: 3;
  /*background: blue;*/
  width: 30%;
}
.sidebar-wrapper .education-container .time-education {
  color: rgba(255, 255, 255, 0.6);
  font-weight: 500;
  margin-bottom: 0px;
  /*background: red;*/
  text-align: right;
  padding-right: 10px;
  margin-left: 30%;
  margin-top: -40px;
}
.interests-list {
  padding-left: 0;
  margin-top: 0;
}
.interests-list:last-child {
  margin-bottom: 0;
}
.lang-desc {
  color: rgba(255, 255, 255, 0.6);
}
.item-exp {
/*  background: red;
*/}
.meta-exp {
  padding-top: 0;
  margin-bottom: 0;
/*  background: green;
*/
  /*background: #D8D8AD;*/
}
.upper-row {
  margin-top: 0;
/*  background: blue;
*/  height: 32px;
  /*display: inline-block;*/
  position: relative;
}
.company {
  color: #97AAC3;
/*  background: pink;
*/}
.job-title {
/*  background: #D8D8AD;
*/  position: absolute;
  /*float: left;*/
  /*display: block;*/
}
.time {
  position: absolute;
  right: 0;
 /* margin-top: -10px;*/
  text-align: right;
  color: #97AAC3;
/*  background: #D9941B;
*/}
.section-title {
  /*background: #D9941B;*/
  margin-bottom: 0;
}
.details {
  /*background: red;*/
  margin-top: 0;
}
.details p {
  margin-bottom: 0;
  margin-top: 0;
  /*background: green;*/
  /*margin-top: 0;*/
}
.summary p {
  /*background: red;*/
  margin-bottom: 0;
}
/*.meta-exp {
  background: #D8D8AD;
}*/
.intro p {
  /*background: blue;*/
  margin-bottom: 0;
  margin-top: 0;
}
.intro p:first-child {
  margin-top: 10;
}
/*.skills-section {
  background: green;
}*/
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
    height: 25px;
    padding-top: 0;
    margin-top: -40px;
}
.skill-level-procent {
    /*padding-bottom: 5px;*/
    /*background: green;*/
   /* margin-top: -5px;
    padding-top: 0;*/
}




</style>
</head>
<body>
  <div class="wrapper">
        <div class="main-wrapper">
            <section class="section summary-section">
                <h2 class="section-title">
                    <img class="fa-title" src="{{ url('IconsFontAvesome/fas-fa-user-krug.png') }}" alt="fas-fa-user-krug">
                    <span>Career Profile</span>
                </h2>
                <div class="summary">
                    {!! $resume->description !!}
                </div>
            </section>

            <section class="section experiences-section">
                <h2 class="section-title">
                    <img class="fa-title" src="{{ url('IconsFontAvesome/fa-briefcase-krug.png') }}" alt="fa-briefcase-krug">
                    <span>Experiences</span>
                </h2>
                @foreach($user->works as $item)
                    <div class="item-exp">
                        <div class="meta-exp">
                            <div class="upper-row">
                                <h3 class="job-title">{{ $item->position }}</h3>
                                <div class="time">{{ $item->start }} - {{ $item->finish ? $item->finish : 'By current time' }}</div>
                            </div>
                            <div class="company">{{ $item->experience }}</div>
                        </div>
                        <div class="details">
                            {!! $item->functions !!}
                        </div>
                    </div>
                @endforeach
            </section>

            @if(!empty($user->projects->description))
                <section class="section projects-section">
                    <h2 class="section-title">
                        <img class="fa-title" src="{{ url('IconsFontAvesome/fa-archive-v-krug.png') }}" alt="fa-archive-v-krug">
                        <span>Projects</span>
                    </h2>
                    <div class="intro">
                        {!! $user->projects->description !!}
                    </div>
                </section>
            @endif

            <section class="skills-section section">
                <h2 class="section-title">
                    <img class="fa-title" src="{{ url('IconsFontAvesome/fa-rocket-krug.png') }}" alt="fa-rocket-krug">
                    <span>Skills &amp; Proficiency</span>
                </h2>
                <div class="skillset">
                    @foreach($user->skills as $skill)
                        <div class="item-skill">
                            <h3 class="level-title">{{ $skill->skill }}</h3>
                            <div class="level-bar">
                                <div class="level-bar-inner" style="width: {{ ($skill->level_id)*20 }}%;">
                                    <span class="skill-level-procent">{{ ($skill->level_id)*20 }}%</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

        </div>

        <div class="sidebar-wrapper">
            <div class="profile-container">
                <img class="profile" src="{{ url($user->profile->photo) }}" alt="{{$user->name}}"/>
                <h1 class="name">{{ $user->name }}</h1>
                <h3 class="tagline">{{ $resume->job_title }}</h3>
            </div>

            <div class="contact-container container-block">
                <ul class="list-unstyled contact-list">
                    <li class="email">
                        <img class="fa-li" src="{{ url('IconsFontAvesome/fa-envelope-bel.png') }}" alt="fa-envelope">
                        {{ $user->email }}
                    </li>
                    <li class="phone">
                        <img class="fa-li" src="{{ url('IconsFontAvesome/fa-phone-bel.png') }}" alt="fa-envelope">
                         {{ $user->phone }}
                    </li>
                    @if (isset($user->profile->web_site))
                        <li class="website">
                            <img class="fa-li" src="{{ url('IconsFontAvesome/fa-globe-bel.png') }}" alt="fa-globe">
                             {{ $user->profile->web_site }}
                        </li>
                    @endif
                    @if (isset($user->profile->linkedin))
                        <li class="linkedin">
                            <img class="fa-li" src="{{ url('IconsFontAvesome/fa-linkedin-bel.png') }}" alt="fa-linkedin">
                             {{ $user->profile->linkedin }}
                        </li>
                    @endif
                    @if (isset($user->profile->git))
                        <li class="github">
                            <img class="fa-li" src="{{ url('IconsFontAvesome/fa-github-bel.png') }}" alt="fa-github">
                             {{ $user->profile->git }}
                        </li>
                    @endif
                    @if (isset($user->profile->dribbble))
                        <li class="dribbble">
                            <img class="fa-li" src="{{ url('IconsFontAvesome/fa-dribbble-bel.png') }}" alt="fa-dribbble">
                             {{ $user->profile->dribbble }}
                        </li>
                    @endif
                    @if (isset($user->profile->behance))
                        <li class="behance">
                            <img class="fa-li" src="{{ url('IconsFontAvesome/fa-behance-bel.png') }}" alt="fa-behance">
                             {{ $user->profile->behance }}
                        </li>
                    @endif
                </ul>
            </div>
            <div class="education-container container-block">
                <h2 class="container-block-title">Education</h2>
                @foreach($user->educations as $education)
                    <div class="item">
                        <h4 class="degree">{{ $education->level }}</h4>
                        <h5 class="meta">{{ $education->university }}</h5>
                        <div class="time-education">{{ $education->start }} - {{ $education->finish ? $education->finish : 'By current time' }}</div>
                    </div>
                @endforeach
            </div>

            <div class="languages-container container-block">
                <h2 class="container-block-title">Languages</h2>
                <ul class="list-unstyled interests-list">
                    @foreach($user->languages as $lenguage)
                        <li>
                            {{ $lenguage->lenguage }} <span class="lang-desc">( {{ $lenguage->level->level }} )</span>
                        </li>
                    @endforeach
                </ul>
            </div>

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
                </div>
            @endif
        </div>

    </div>
</body>
</html>









