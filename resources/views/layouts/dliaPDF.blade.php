<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resume {{$resume->user->name}}</title>
 <style>
@font-face {
    font-family: 'Nunito';
    src: url(fonts/Nunito_Sans/NunitoSans-Regular.ttf);
    font-weight: 300;
}
@font-face {
    font-family: 'Nunito';
    src: url(fonts/Nunito_Sans/NunitoSans-Regular.ttf);
    font-weight: 400;
}
@font-face {
    font-family: 'Nunito';
    src: url(fonts/Nunito_Sans/NunitoSans-Regular.ttf);
    font-weight: 500;
}
@font-face {
    font-family: 'Nunito';
    src: url(fonts/Nunito_Sans/NunitoSans-Regular.ttf);
    font-weight: 600;
}
@font-face {
    font-family: 'Nunito';
    src: url(fonts/Nunito_Sans/NunitoSans-Regular.ttf);
    font-weight: 700;
}
@font-face {
    font-family: 'Nunito';
    src: url(fonts/Nunito_Sans/NunitoSans-Regular.ttf);
    font-weight: 900;
}
@font-face {
    font-family: 'Nunito';
    src: url(fonts/Nunito_Sans/NunitoSans-Bold.ttf);
    font-weight: bold;
}
body {
  font-family: 'Nunito';
  color: #545E6C;
  font-size: 14px;
  padding: 0px;
}
.main-wrapper strong {
  font-family: 'Nunito';
  font-weight: bold;
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
.interests-container li {
    list-style-type: none;
}
.languages-container li {
    list-style-type: none;
}
.contact-container li {
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
}
.main-wrapper {
  width: 370px;
  height: 99%;
  float: left;
  display: block;
}
.sidebar-wrapper {
  width: 320px;
  height: 99%;
  background: #42A8C0;
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
  padding-left: 20px;
}
.container-block-title {
  text-transform: uppercase;
  font-size: 16px;
  font-weight: 700;
  margin-top: 10px;
  margin-bottom: 5px;
}
.sidebar-wrapper .degree {
  font-size: 14px;
  margin-top: 0;
  margin-bottom: 5px;
}
.sidebar-wrapper .education-container .item {
  margin-top: -15px;
  margin-bottom: 0;
}
.sidebar-wrapper .education-container .item:last-child {
  margin-bottom: 0;
}
.sidebar-wrapper .education-container .meta {
  color: #fff;
  font-weight: 500;
  margin-bottom: 0px;
  width: 70%;
  text-align: left;
}
.meta-level-education {
  color: rgba(255, 255, 255, 0.6);
  font-weight: 500;
  margin-bottom: 0px;
  text-align: right;
  margin-left: -90%;
  padding-right: 10px;
  margin-top: -40px;
}
.sidebar-wrapper .education-container .time-education {
  color: rgba(255, 255, 255, 0.6);
  font-weight: 500;
  margin-bottom: 0px;
  margin-top: -5px;
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
.meta-exp {
  padding-top: 0;
  margin-bottom: 0;
}
.upper-row {
  margin-top: 0;
  height: 32px;
  position: relative;
}
.company {
  color: #97AAC3;
}
.job-title {
  position: absolute;
}
.time {
  position: absolute;
  right: 0;
  text-align: right;
  color: #97AAC3;
}
.section-title {
  margin-bottom: 0;
}
.details {
  margin-top: 0;
}
.details p {
  margin-bottom: 0;
  margin-top: 0;
}
.summary p {
  margin-bottom: 0;
}
.intro p {
  margin-bottom: 0;
  margin-top: 0;
}
.intro p:first-child {
  margin-top: 10;
}
.skillset {
    padding-top: 20px;
}
.level-title {
    width: 30%;
    font-size: 14px;
}
.level-bar {
    margin-left: 30%;
}
.level-bar-inner {
    background-color: #42A8C0;
    height: 25px;
    padding-top: 0;
    margin-top: -40px;
}
/*vue2-editor styles*/

.ql-align-center {
  text-align: center;
}
.ql-align-right {
  text-align: right;

}
.ql-align-justify {
  text-align: justify;
}

.main-wrapper .summary-section ol {
  counter-reset: first-counter;
  list-style-type: none;
}
.main-wrapper .summary-section ol li {
  counter-increment: first-counter;
}
.main-wrapper .summary-section ol li::before {
  content: counter(first-counter)'. ';
}
.main-wrapper .summary-section ul {
  list-style-type: none;
}
.main-wrapper .summary-section ul li::before {
  content: "\2022"" ";
}

.main-wrapper .experiences-section .details ol {
  counter-reset: second-counter;
  list-style-type: none;
}
.main-wrapper .experiences-section .details ol li {
  counter-increment: second-counter;
}
.main-wrapper .experiences-section .details ol li::before {
  content: counter(second-counter)'. ';
}
.main-wrapper .experiences-section .details ul {
  list-style-type: none;
}
.main-wrapper .experiences-section .details ul li::before {
  content: "\2022"" ";
}

.main-wrapper .projects-section .intro ol {
  counter-reset: three-counter;
  list-style-type: none;
}
.main-wrapper .projects-section .intro ol li {
  counter-increment: three-counter;
}
.main-wrapper .projects-section .intro ol li::before {
  content: counter(three-counter)'. ';
}
.main-wrapper .projects-section .intro ul {
  list-style-type: none;
}
.main-wrapper .projects-section .intro ul li::before {
  content: "\2022"" ";
}

/*end vue2-editor styles*/
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
                @foreach($resume->user->experiences as $item)
                    <div class="item-exp">
                        <div class="meta-exp">
                            <div class="upper-row">
                                <h3 class="job-title">{{ $item->company }}</h3>
                                <div class="time"> <strong>{{ $item->position }}</strong></div>
                            </div>
                            <div class="company">{{ $item->start }} - {{ $item->finish ? $item->finish : 'By current time' }}</div>
                        </div>
                        <div class="details">
                            {!! $item->functions !!}
                        </div>
                    </div>
                @endforeach
            </section>

            @if(!empty($resume->user->projects->description))
                <section class="section projects-section">
                    <h2 class="section-title">
                        <img class="fa-title" src="{{ url('IconsFontAvesome/fa-archive-v-krug.png') }}" alt="fa-archive-v-krug">
                        <span>Projects</span>
                    </h2>
                    <div class="intro">
                        {!! $resume->user->projects->description !!}
                    </div>
                </section>
            @endif

            <section class="skills-section section">
                <h2 class="section-title">
                    <img class="fa-title" src="{{ url('IconsFontAvesome/fa-rocket-krug.png') }}" alt="fa-rocket-krug">
                    <span>Skills &amp; Proficiency</span>
                </h2>
                <div class="skillset">
                    @foreach($resume->user->skills as $skill)
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
                <img class="profile" src="{{ url($resume->user->profile->photo) }}" alt="{{$resume->user->name}}"/>
                <h1 class="name">{{ $resume->user->name }}</h1>
                <h3 class="tagline">{{ $resume->job_title }}</h3>
            </div>

            <div class="contact-container container-block">
                <ul class="list-unstyled contact-list">
                    <li class="email">
                        <img class="fa-li" src="{{ url('IconsFontAvesome/fa-envelope-bel.png') }}" alt="fa-envelope">
                        {{ $resume->user->email }}
                    </li>
                    <li class="phone">
                        <img class="fa-li" src="{{ url('IconsFontAvesome/fa-phone-bel.png') }}" alt="fa-envelope">
                         {{ $resume->user->phone }}
                    </li>
                    @if (isset($user->profile->web_site))
                        <li class="website">
                            <img class="fa-li" src="{{ url('IconsFontAvesome/fa-globe-bel.png') }}" alt="fa-globe">
                             {{ $resume->user->profile->web_site }}
                        </li>
                    @endif
                    @if (isset($resume->user->profile->linkedin))
                        <li class="linkedin">
                            <img class="fa-li" src="{{ url('IconsFontAvesome/fa-linkedin-bel.png') }}" alt="fa-linkedin">
                             {{ $resume->user->profile->linkedin }}
                        </li>
                    @endif
                    @if (isset($resume->user->profile->git))
                        <li class="github">
                            <img class="fa-li" src="{{ url('IconsFontAvesome/fa-github-bel.png') }}" alt="fa-github">
                             {{ $resume->user->profile->git }}
                        </li>
                    @endif
                    @if (isset($resume->user->profile->dribbble))
                        <li class="dribbble">
                            <img class="fa-li" src="{{ url('IconsFontAvesome/fa-dribbble-bel.png') }}" alt="fa-dribbble">
                             {{ $resume->user->profile->dribbble }}
                        </li>
                    @endif
                    @if (isset($resume->user->profile->behance))
                        <li class="behance">
                            <img class="fa-li" src="{{ url('IconsFontAvesome/fa-behance-bel.png') }}" alt="fa-behance">
                             {{ $resume->user->profile->behance }}
                        </li>
                    @endif
                </ul>
            </div>
            <div class="education-container container-block">
                <h2 class="container-block-title">Education</h2>
                @foreach($resume->user->education as $education)
                    <div class="item">
                        <h4 class="meta">{{ $education->university }}</h4>
                        <h4 class="meta-level-education">{{ $education->degree }}</h4>
                        <h4 class="degree">{{ $education->specialty }}</h4>
                        <div class="time-education">{{ $education->start }} - {{ $education->finish ? $education->finish : 'By current time' }}</div>
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

    </div>
</body>
</html>









