<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resume {{$user->name}}</title>

{{--     <link href="/storage/pdf/stylePdf.css" rel="stylesheet" type="text/css">
 --}}
 <style>
body {
  font-family: 'Roboto', sans-serif;
  color: #545E6C;
  background: #f5f5f5;
  font-size: 14px;
  padding: 30px;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
h1,
h2,
h3,
h4,
h5,
h6 {
  font-weight: 700;
}
a {
  color: #2d7788;
  -webkit-transition: all 0.4s ease-in-out;
  -moz-transition: all 0.4s ease-in-out;
  -ms-transition: all 0.4s ease-in-out;
  -o-transition: all 0.4s ease-in-out;
}
a:hover {
  text-decoration: underline;
  color: #1a454f;
}
a:focus {
  text-decoration: none;
}
p {
  line-height: 1.5;
}
li {
    list-style-type: none;
}
.container-block {
    padding-left: 10px;
    padding-right: 10px;
}


</style>
</head>
<body>
    <div class="wrapper" style="margin: 0 auto; position: relative;">
            <div class="sidebar-wrapper" style="background: #42A8C0; position: absolute; right: 0; width: 300px; color: #fff;">
                <div class="profile-container" style="padding: 30px; background: rgba(0, 0, 0, 0.2); text-align: center; color: #fff;">
                    <img class="profile" src="'http://resumevue3.test/'{!! $user->profile->photo !!}" alt="{{$user->name}}" style="width: 150px; border-radius: 50%; margin: 10px 25% 10px 25%;" />
                    <h1 class="name">{{ $user->name }}</h1>
                    <h3 class="tagline">{{ $resume->job_title }}</h3>
                </div><!--//profile-container-->

                <div class="contact-container container-block">
                    <ul class="list-unstyled contact-list">
                        <li class="email"><i class="fa fa-envelope"></i>{{ $user->email }}</li>
                        <li class="phone"><i class="fa fa-phone"></i> {{ $user->phone }}</li>
                        @if (isset($user->profile->web_site))
                          <li class="website"><i class="fa fa-globe"></i> {{ $user->profile->web_site }}</li>
                        @endif
                        @if (isset($user->profile->linkedin))
                          <li class="linkedin"><i class="fab fa-linkedin"></i> {{ $user->profile->linkedin }}</li>
                        @endif
                        @if (isset($user->profile->git))
                          <li class="github"><i class="fab fa-github"></i> {{ $user->profile->git }}</li>
                        @endif
                        @if (isset($user->profile->dribbble))
                          <li class="dribbble"><i class="fab fa-dribbble"></i> {{ $user->profile->dribbble }}</li>
                        @endif
                        @if (isset($user->profile->behance))
                          <li class="behance"><i class="fab fa-behance"></i> {{ $user->profile->behance }}</li>
                        @endif
                    </ul>
                </div><!--//contact-container-->
                <div class="education-container container-block">
                    <h2 class="container-block-title">Education</h2>
                    @foreach($user->educations as $education)
                        <div class="item">
                            <h4 class="degree">{{ $education->level }}</h4>
                            <h5 class="meta">{{ $education->university }}</h5>
                            <div class="time">{{ $education->start }} - {{ $education->finish }}</div>
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

            </div><!--//sidebar-wrapper-->

            <div class="main-wrapper" style="padding-right: 310px;">

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
                                    <h3 class="job-title">{{ $item->position }}</h3>
                                    <div class="time">{{ $item->start }} - {{ $item->finish }}</div>
                                </div><!--//upper-row-->
                                <div class="company">{{ $item->experience }}</div>
                            </div><!--//meta-->
                            <div class="details">
                                {!! $item->functions !!}
                            </div><!--//details-->
                        </div><!--//item-->
                    @endforeach
                </section><!--//section-->

                <section class="section projects-section">
                    <h2 class="section-title"><i class="fa fa-archive"></i>Projects</h2>
                    <div class="intro">
                        {!! $user->projects->description !!}
                    </div><!--//intro-->
                </section><!--//section-->

                <section class="skills-section section">
                    <h2 class="section-title"><i class="fa fa-rocket"></i>Skills &amp; Proficiency</h2>
                    <div class="skillset">
                        @foreach($user->skills as $skill)
                            <div class="item">
                                <h3 class="level-title" style="width: 30%;">{{ $skill->skill }}</h3>
                                <div class="level-bar" style="margin-left: 30%;">
                                  <div class="level-bar-inner" style="width: {{ ($skill->level_id)*25 }}%; background-color: #42A8C0">
                                  {{-- <div class="level-bar-inner" data-level="50%"> --}}
                                  </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section><!--//skills-section-->

            </div><!--//main-body-->
        </div>
</body>
</html>
