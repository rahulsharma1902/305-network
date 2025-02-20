@extends('user_layout.master')

@section('content')
<!-- banner section start  -------------------->
<section class="Coach">
    <div class="container">
        <div class="coach_info">

            <div class="col_input">
                <div class="info_search ms-auto d-flex">
                    <div class="info_search ms-auto d-flex">
                        <select class="montserrat ">
                            <option value="1">Jube Joseph</option>
                            <option value="2">Jube Joseasxph</option>
                            <option value="3">Jube Jxsazoseph</option>
                            <option value="4">Jube Joseph</option>
                        </select>
                        <div class="i_search">
                            <i class="fa-solid fa-magnifying-glass text-white"></i>
                        </div>
                    </div>
                </div>

            </div>


            <div class="coach_name">
                <div class="row coach_name_d">
                    <div class="col-lg-8 col-md-8  col-sm-10 coach_name_part_1">
                        <div class="inner_name ">
                            <h3 class="m-0 text-white">Jube Joseph</h3>
                        </div>
                    </div>
                    <div
                        class="col-lg-4 col-md-4 col-sm-2 coach_name_part_2 d-flex justify-content-end align-items-center">
                        <div class="inner_img_logo ">
                            <img src="{{asset('img/twitter-x 1.png')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="coach_img">
                    <img src="{{asset('img/coach.png')}}" alt="">
                </div>
            </div>

            <div class="coach_title">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="inner_name_title brdr_b">
                            <p class="m-0">
                                <span>
                                    Title:
                                </span>
                                Head Coach
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="inner_name_title brdr_b">
                            <p class="m-0">
                                <span>
                                    Phone:
                                </span>
                                (920) 499-BLIZ (2549)
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <nav class="tab-container">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                        aria-selected="true"><svg width="21" height="19" viewBox="0 0 21 19" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.58307 9.07532C9.62735 9.54763 9.99757 9.9372 10.4891 9.98392C11.0544 10.0427 11.5331 9.618 11.591 9.08239L11.591 9.08239L11.5917 9.07561L12.0043 4.70106L12.0066 4.67763V4.6541V4.65379V4.65348V4.65317V4.65287V4.65256V4.65225V4.65194V4.65163V4.65132V4.65101V4.6507V4.65039V4.65008V4.64977V4.64946V4.64915V4.64884V4.64853V4.64822V4.64791V4.6476V4.64729V4.64698V4.64666V4.64635V4.64604V4.64573V4.64541V4.6451V4.64479V4.64448V4.64416V4.64385V4.64354V4.64322V4.64291V4.6426V4.64228V4.64197V4.64165V4.64134V4.64102V4.64071V4.6404V4.64008V4.63976V4.63945V4.63913V4.63882V4.6385V4.63819V4.63787V4.63755V4.63724V4.63692V4.6366V4.63629V4.63597V4.63565V4.63534V4.63502V4.6347V4.63438V4.63406V4.63375V4.63343V4.63311V4.63279V4.63247V4.63215V4.63183V4.63152V4.6312V4.63088V4.63056V4.63024V4.62992V4.6296V4.62928V4.62896V4.62864V4.62831V4.62799V4.62767V4.62735V4.62703V4.62671V4.62639V4.62607V4.62574V4.62542V4.6251V4.62478V4.62446V4.62413V4.62381V4.62349V4.62317V4.62284V4.62252V4.6222V4.62187V4.62155V4.62122V4.6209V4.62058V4.62025V4.61993V4.6196V4.61928V4.61896V4.61863V4.61831V4.61798V4.61765V4.61733V4.617V4.61668V4.61635V4.61603V4.6157V4.61537V4.61505V4.61472V4.6144V4.61407V4.61374V4.61341V4.61309V4.61276V4.61243V4.61211V4.61178V4.61145V4.61112V4.6108V4.61047V4.61014V4.60981V4.60948V4.60915V4.60882V4.6085V4.60817V4.60784V4.60751V4.60718V4.60685V4.60652V4.60619V4.60586V4.60553V4.6052V4.60487V4.60454V4.60421V4.60388V4.60355V4.60322V4.60289V4.60256V4.60222V4.60189V4.60156V4.60123V4.6009V4.60057V4.60024V4.5999V4.59957V4.59924V4.59891V4.59857V4.59824V4.59791V4.59758V4.59724V4.59691V4.59658V4.59624V4.59591V4.59558V4.59524V4.59491V4.59458V4.59424V4.59391V4.59358V4.59324V4.59291V4.59257V4.59224V4.5919V4.59157V4.59123V4.5909V4.59056V4.59023V4.58989V4.58956V4.58922V4.58889V4.58855V4.58822V4.58788V4.58754V4.58721V4.58687V4.58654V4.5862V4.58586V4.58553V4.58519V4.58485V4.58452V4.58418V4.58384V4.5835V4.58317V4.58283V4.58249V4.58215V4.58182V4.58148V4.58114V4.5808V4.58047V4.58013V4.57979V4.57945V4.57911V4.57877V4.57843V4.5781V4.57776V4.57742V4.57708V4.57674V4.5764V4.57606V4.57572V4.57538V4.57504V4.5747V4.57436V4.57402V4.57368V4.57334V4.573V4.57266V4.57232V4.57198V4.57164V4.5713V4.57096V4.57062V4.57028V4.56994V4.5696V4.56926V4.56892V4.56858V4.56823V4.56789V4.56755V4.56721V4.56687V4.56653V4.56618V4.56584V4.5655V4.56516V4.56482V4.56447V4.56413V4.56379V4.56345V4.56311V4.56276V4.56242V4.56208V4.56173V4.56139V4.56105V4.56071V4.56036V4.56002V4.55968V4.55933V4.55899V4.55865V4.5583V4.55796V4.55761V4.55727V4.55693V4.55658V4.55624V4.55589V4.55555V4.55521V4.55486V4.55452V4.55417V4.55383V4.55348V4.55314V4.55279V4.55245V4.5521V4.55176V4.55141V4.55107V4.55072V4.55038V4.55003V4.54969V4.54934V4.549V4.54865V4.54831V4.54796V4.54762V4.54727V4.54692V4.54658V4.54623V4.54589V4.54554V4.54519V4.54485V4.5445V4.54416V4.54381V4.54346V4.54312V4.54277V4.54242V4.54208V4.54173V4.54138V4.54104V4.54069V4.54034V4.54V4.53965V4.5393V4.53895V4.53861V4.53826V4.53791V4.53756V4.53722V4.53687V4.53652V4.53617V4.53583V4.53548V4.53513V4.53478V4.53444V4.53409V4.53374V4.53339V4.53304V4.5327V4.53235V4.532V4.53165V4.5313V4.53095V4.53061V4.53026V4.52991V4.52956V4.52921V4.52886V4.52851V4.52817V4.52782V4.52747V4.52712V4.52677V4.52642V4.52607V4.52572V4.52537V4.52502V4.52468V4.52433V4.52398V4.52363V4.52328V4.52293V4.52258V4.52223V4.52188V4.52153V4.52118V4.52083V4.52048V4.52013V4.51978V4.51943V4.51908V4.51873V4.51838V4.51803V4.51768V4.51733V4.51698V4.51663V4.51628V4.51593V4.51558V4.51523V4.51488V4.51453V4.51418V4.51383V4.51348V4.51313V4.51278V4.51243V4.51208V4.51173V4.51138V4.51103V4.51068V4.51033V4.50998V4.50963V4.50928V4.50892V4.50857V4.50822V4.50787V4.50752V4.50717V4.50682V4.50647V4.50612V4.50577V4.50542V4.50507V4.50471V4.50436V4.50401V4.50366V4.50331V4.50296V4.50261V4.50226V4.50191V4.50155V4.5012V4.50085V4.5005V4.50015V4.4998V4.49945V4.4991V4.49874V4.49839V4.49804V4.49769V4.49734V4.49699V4.49664V4.49629V4.49593V4.49558V4.49523V4.49488V4.49453V4.49418V4.49382V4.49347V4.49312V4.49277V4.49242V4.49207V4.49172V4.49136V4.49101V4.49066V4.49031V4.48996V4.48961V4.48925V4.4889V4.48855V4.4882V4.48785V4.4875V4.48714V4.48679V4.48644V4.48609V4.48574V4.48539V4.48503V4.48468V4.48433V4.48398V4.48363V4.48328V4.48292V4.48257V4.48222V4.48187V4.48152V4.4595L12.0046 4.43757C11.9347 3.64501 11.2351 3.08191 10.4571 3.15056C9.66458 3.22049 9.10148 3.92003 9.17013 4.69804L9.17012 4.69805L9.1704 4.70106L9.58307 9.07532ZM9.58307 9.07532L10.0809 9.02865L9.5831 9.07561L9.58307 9.07532ZM3.05671 17.6493L3.05668 17.6493L3.05215 17.6539C2.86555 17.8454 2.61406 17.9456 2.35227 17.9456C2.22271 17.9456 2.0915 17.9209 1.96285 17.8698C1.59165 17.7152 1.35156 17.3526 1.35156 16.9449V4.55655C1.35156 2.34903 3.14615 0.554443 5.35367 0.554443H15.7761H15.7836C17.9911 0.554443 19.7857 2.34903 19.7857 4.55655V11.1972C19.7857 13.4047 17.9911 15.1993 15.7836 15.1993H6.02899C5.69874 15.1993 5.38247 15.3235 5.14269 15.5633L3.05671 17.6493ZM11.4602 12.1754L11.4701 12.1661L11.4793 12.1563C11.6964 11.9272 11.834 11.6112 11.834 11.2797C11.834 11.1372 11.813 10.9628 11.7291 10.7873C11.6697 10.6492 11.5884 10.524 11.488 10.4125L11.4762 10.3993L11.4634 10.387C11.1126 10.0487 10.5733 9.93846 10.1106 10.126L10.1106 10.126L10.1062 10.1278C9.9622 10.1878 9.83191 10.2713 9.71639 10.3753L9.69683 10.3929L9.67922 10.4125C9.57887 10.524 9.49759 10.6492 9.43811 10.7873C9.35427 10.9628 9.33327 11.1372 9.33327 11.2797C9.33327 11.6112 9.47083 11.9272 9.6879 12.1563L9.70159 12.1708L9.71639 12.1841C9.8279 12.2845 9.95316 12.3657 10.0912 12.4252C10.2667 12.5091 10.4412 12.5301 10.5836 12.5301C10.9151 12.5301 11.2311 12.3925 11.4602 12.1754Z"
                                fill="black" stroke="black" />
                        </svg>
                        Bio</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><svg width="17"
                            height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.37 13.6176V16.6942L13.4445 13.6176H10.37ZM13.5672 0.75H0.863786C0.668381 0.75 0.5 0.918381 0.5 1.11379V16.8189C0.5 17.0164 0.668381 17.1682 0.863786 17.1682H9.55306C9.55306 17.1619 9.55514 17.1557 9.55514 17.1495C9.54267 16.6381 9.5593 16.1246 9.5593 15.6132V13.8089C9.5593 13.759 9.55306 13.7112 9.55514 13.6613C9.56346 13.3474 9.71937 13.0314 10.0166 12.8963C10.2432 12.7923 10.4594 12.8048 10.6964 12.8048H13.9143V1.11379C13.9164 0.916302 13.7626 0.75 13.5672 0.75ZM7.66762 15.1455H3.00492C2.72013 15.1455 2.5081 14.9127 2.49562 14.6362C2.48315 14.3618 2.73884 14.1269 3.00492 14.1269H7.66762C7.95241 14.1269 8.16444 14.3597 8.17691 14.6362C8.18939 14.9106 7.93578 15.1455 7.66762 15.1455ZM7.66762 12.3745H3.00492C2.72013 12.3745 2.5081 12.1417 2.49562 11.8652C2.48315 11.5908 2.73884 11.3559 3.00492 11.3559H7.66762C7.95241 11.3559 8.16444 11.5887 8.17691 11.8652C8.18939 12.1396 7.93578 12.3745 7.66762 12.3745ZM11.4094 9.60558C11.4053 9.60558 11.399 9.60558 11.3949 9.60558C11.056 9.61389 10.7151 9.60558 10.3763 9.60558H3.00492C2.72013 9.60558 2.5081 9.37276 2.49562 9.09628C2.48315 8.82188 2.73884 8.58698 3.00492 8.58698H3.01947C3.35832 8.57867 3.69923 8.58698 4.03807 8.58698H11.4094C11.6942 8.58698 11.9062 8.8198 11.9187 9.09628C11.9312 9.37068 11.6776 9.60558 11.4094 9.60558ZM11.4094 6.83457C11.4053 6.83457 11.399 6.83457 11.3949 6.83457C11.056 6.84289 10.7151 6.83457 10.3763 6.83457H3.00492C2.72013 6.83457 2.5081 6.60175 2.49562 6.32527C2.48315 6.05088 2.73884 5.81597 3.00492 5.81597H3.01947C3.35832 5.80766 3.69923 5.81597 4.03807 5.81597H11.4094C11.6942 5.81597 11.9062 6.0488 11.9187 6.32527C11.9312 6.59967 11.6776 6.83457 11.4094 6.83457ZM11.4094 4.06565C11.4053 4.06565 11.399 4.06565 11.3949 4.06565C11.056 4.07396 10.7151 4.06565 10.3763 4.06565H3.00492C2.72013 4.06565 2.5081 3.83282 2.49562 3.55635C2.48315 3.28195 2.73884 3.04705 3.00492 3.04705H3.01947C3.35832 3.03873 3.69923 3.04705 4.03807 3.04705H11.4094C11.6942 3.04705 11.9062 3.27987 11.9187 3.55635C11.9312 3.83074 11.6776 4.06565 11.4094 4.06565Z"
                                fill="black" />
                            <path
                                d="M16.4982 3.88897V19.3862C16.4982 19.5837 16.3298 19.75 16.1323 19.75H3.63891C3.44142 19.75 3.28967 19.5816 3.28967 19.3862V17.9165H10.2141L14.6647 13.4659V3.53973H16.1344C16.3298 3.53973 16.4982 3.69148 16.4982 3.88897Z"
                                fill="black" />
                        </svg>
                        Career Coaching Records</button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                        type="button" role="tab" aria-controls="nav-contact" aria-selected="false"><svg width="14"
                            height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6.88703 3.38149C6.97207 3.38149 7.04088 3.3126 7.04088 3.22764C7.04088 3.14268 6.97207 3.07379 6.88703 3.07379C4.71151 3.07379 2.94165 4.84365 2.94165 7.01917C2.94165 7.10413 3.01046 7.17302 3.0955 7.17302C3.18054 7.17302 3.24935 7.10413 3.24935 7.01917C3.24935 5.01335 4.88114 3.38149 6.88703 3.38149Z"
                                fill="black" />
                            <path
                                d="M9.46121 5.98671L7.77811 5.7421L7.02577 4.21592C6.97349 4.11129 6.80116 4.11129 6.74885 4.21592L5.99653 5.7421L4.31343 5.98671C4.25497 5.99441 4.20729 6.03594 4.18881 6.09133C4.17035 6.14672 4.18573 6.20825 4.22727 6.24826L5.44576 7.43597L5.15806 9.11292C5.14882 9.16984 5.1719 9.22831 5.21959 9.2637C5.24577 9.28216 5.27807 9.29293 5.31037 9.29293C5.33497 9.29293 5.35961 9.28677 5.38114 9.27446L6.88732 8.48368L8.39351 9.27446C8.44427 9.30216 8.50735 9.29754 8.55504 9.2637C8.60272 9.22831 8.62582 9.16984 8.61658 9.11292L8.32888 7.43597L9.54737 6.24826C9.58891 6.20825 9.60428 6.14672 9.58583 6.09133C9.56735 6.03594 9.51967 5.99441 9.46121 5.98671Z"
                                fill="black" />
                            <path
                                d="M8.52105 13.968C8.43616 14.0498 8.32273 14.0957 8.20283 14.0957C8.14559 14.0957 8.08955 14.0852 8.03606 14.0645L6.88716 13.6184L5.73855 14.0644C5.69032 14.0845 5.63203 14.096 5.57178 14.096C5.45369 14.096 5.34086 14.0508 5.25402 13.9687L4.36097 13.1177L4.08099 13.111V20.0961C4.08099 20.1546 4.1133 20.2069 4.16562 20.2331C4.21638 20.2592 4.27792 20.2546 4.32561 20.2208L6.88719 18.3592L9.44876 20.2208C9.47648 20.2408 9.50724 20.25 9.53954 20.25C9.56415 20.25 9.58725 20.2438 9.60877 20.2331C9.66109 20.2069 9.69339 20.1546 9.69339 20.0961V13.111L9.41349 13.1177L8.52105 13.968ZM8.24655 14.8403H8.68241C8.76745 14.8403 8.83626 14.9092 8.83626 14.9942C8.83626 15.0791 8.76745 15.148 8.68241 15.148H8.24655C8.16152 15.148 8.09271 15.0791 8.09271 14.9942C8.09271 14.9092 8.16152 14.8403 8.24655 14.8403ZM6.42756 14.8403H7.40039C7.48542 14.8403 7.55423 14.9092 7.55423 14.9942C7.55423 15.0791 7.48542 15.148 7.40039 15.148H6.42756C6.34253 15.148 6.27371 15.0791 6.27371 14.9942C6.27371 14.9092 6.34253 14.8403 6.42756 14.8403ZM6.32344 15.9942H8.68241C8.76745 15.9942 8.83626 16.0631 8.83626 16.1481C8.83626 16.233 8.76745 16.3019 8.68241 16.3019H6.32344C6.23841 16.3019 6.1696 16.233 6.1696 16.1481C6.1696 16.0631 6.23841 15.9942 6.32344 15.9942ZM5.50222 17.4558H5.04142C4.95638 17.4558 4.88757 17.3869 4.88757 17.3019C4.88757 17.217 4.95638 17.1481 5.04142 17.1481H5.50222C5.58725 17.1481 5.65607 17.217 5.65607 17.3019C5.65607 17.3869 5.58725 17.4558 5.50222 17.4558ZM4.88757 16.1481C4.88757 16.0631 4.95638 15.9942 5.04142 15.9942H5.47728C5.56231 15.9942 5.63113 16.0631 5.63113 16.1481C5.63113 16.233 5.56231 16.3019 5.47728 16.3019H5.04142C4.95638 16.3019 4.88757 16.233 4.88757 16.1481ZM5.63113 15.148H5.04142C4.95638 15.148 4.88757 15.0791 4.88757 14.9942C4.88757 14.9092 4.95638 14.8403 5.04142 14.8403H5.63113C5.71616 14.8403 5.78497 14.9092 5.78497 14.9942C5.78497 15.0791 5.71616 15.148 5.63113 15.148ZM7.88687 17.4558H6.29865C6.21362 17.4558 6.14481 17.3869 6.14481 17.3019C6.14481 17.217 6.21362 17.1481 6.29865 17.1481H7.88687C7.97191 17.1481 8.04072 17.217 8.04072 17.3019C8.04072 17.3869 7.97191 17.4558 7.88687 17.4558ZM8.73304 17.4558H8.46456C8.37952 17.4558 8.31071 17.3869 8.31071 17.3019C8.31071 17.217 8.37952 17.1481 8.46456 17.1481H8.73304C8.81808 17.1481 8.88689 17.217 8.88689 17.3019C8.88689 17.3869 8.81808 17.4558 8.73304 17.4558Z"
                                fill="black" />
                            <path
                                d="M13.1565 7.01901L13.6457 5.75899C13.6673 5.7036 13.655 5.64052 13.6134 5.59745L12.6811 4.61897L12.6488 3.26818C12.6473 3.20817 12.6119 3.15433 12.5565 3.12971L11.3196 2.58663L10.7765 1.34969C10.7519 1.29429 10.698 1.25891 10.638 1.25737L9.28721 1.2266L8.30874 0.292746C8.26565 0.251204 8.20259 0.238893 8.14719 0.260434L6.88717 0.751212L5.62716 0.260434C5.57176 0.238893 5.5087 0.251204 5.46561 0.292746L4.48712 1.2266L3.13634 1.25737C3.07634 1.25891 3.02249 1.29429 2.99787 1.34969L2.45478 2.58663L1.21783 3.13125C1.16247 3.15587 1.12709 3.20971 1.12555 3.26972L1.09477 4.61897L0.160911 5.59745C0.119369 5.64052 0.107049 5.7036 0.128609 5.75899L0.619378 7.01901L0.128609 8.27903C0.107049 8.33441 0.119369 8.3975 0.160911 8.44057L1.09477 9.41905L1.12555 10.7698C1.12709 10.8298 1.16247 10.8837 1.21783 10.9068L2.45478 11.4529L3.00095 12.6883C3.02403 12.7437 3.07788 12.7791 3.13788 12.7806L4.48712 12.8129L5.46561 13.7453C5.49484 13.773 5.5333 13.7884 5.57176 13.7884C5.59024 13.7884 5.60868 13.7853 5.62716 13.7776L6.88717 13.2883L8.14719 13.7776C8.20259 13.7991 8.26565 13.7868 8.30874 13.7453L9.28721 12.8129L10.638 12.7806C10.698 12.7791 10.7519 12.7437 10.7765 12.6883L11.3211 11.4529L12.5565 10.9068C12.6119 10.8837 12.6473 10.8298 12.6488 10.7698L12.6811 9.41905L13.6134 8.44057C13.655 8.3975 13.6673 8.33441 13.6457 8.27903L13.1565 7.01901ZM6.88717 12.0422C4.1179 12.0422 1.86555 9.78829 1.86555 7.01901C1.86555 4.24973 4.1179 1.99738 6.88717 1.99738C9.65645 1.99738 11.9103 4.24973 11.9103 7.01901C11.9103 9.78829 9.65645 12.0422 6.88717 12.0422Z"
                                fill="black" />
                        </svg>
                        Postseason Appearances</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <h5 class="m-0">Lorem Ipsum is simply dummy text of the printing.</h5>
                    <div class="pane_p">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                            has been the industry's standard dummy text ever since the 1500s, when an unknown
                            printer took a galley of type and scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of
                            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                            publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                            has been the industry's standard dummy text ever since the 1500s, when an unknown
                            printer took a galley of type and scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of
                            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                            publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form, by injected humour, or randomised words which don't
                            look even slightly believable. If you are going to use a passage of Lorem Ipsum, you
                            need to be sure there isn't anything embarrassing hidden in the middle of text. All the
                            Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary,
                            making this the first true generator on the Internet. It uses a dictionary of over 200
                            Latin words, combined with a handful of model sentence structures, to generate Lorem
                            Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from
                            repetition, injected humour, or non-characteristic words etc</p>
                    </div>

                    <h5 class="m-0">Lorem Ipsum is simply dummy text of the printing.</h5>
                    <div class="pane_p">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                            has been the industry's standard dummy text ever since the 1500s, when an unknown
                            printer took a galley of type and scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of
                            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                            publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                            has been the industry's standard dummy text ever since the 1500s, when an unknown
                            printer took a galley of type and scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of
                            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                            publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <h5 class="m-0">Lorem Ipsum is simply dummy text of the printing.</h5>
                    <div class="pane_p">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                            has been the industry's standard dummy text ever since the 1500s, when an unknown
                            printer took a galley of type and scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of
                            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                            publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                            has been the industry's standard dummy text ever since the 1500s, when an unknown
                            printer took a galley of type and scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of
                            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                            publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form, by injected humour, or randomised words which don't
                            look even slightly believable. If you are going to use a passage of Lorem Ipsum, you
                            need to be sure there isn't anything embarrassing hidden in the middle of text. All the
                            Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary,
                            making this the first true generator on the Internet. It uses a dictionary of over 200
                            Latin words, combined with a handful of model sentence structures, to generate Lorem
                            Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from
                            repetition, injected humour, or non-characteristic words etc</p>
                    </div>

                    <h5 class="m-0">Lorem Ipsum is simply dummy text of the printing.</h5>
                    <div class="pane_p">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                            has been the industry's standard dummy text ever since the 1500s, when an unknown
                            printer took a galley of type and scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of
                            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                            publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                            has been the industry's standard dummy text ever since the 1500s, when an unknown
                            printer took a galley of type and scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of
                            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                            publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <h5 class="m-0">Lorem Ipsum is simply dummy text of the printing.</h5>
                    <div class="pane_p">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                            has been the industry's standard dummy text ever since the 1500s, when an unknown
                            printer took a galley of type and scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of
                            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                            publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                            has been the industry's standard dummy text ever since the 1500s, when an unknown
                            printer took a galley of type and scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of
                            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                            publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form, by injected humour, or randomised words which don't
                            look even slightly believable. If you are going to use a passage of Lorem Ipsum, you
                            need to be sure there isn't anything embarrassing hidden in the middle of text. All the
                            Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary,
                            making this the first true generator on the Internet. It uses a dictionary of over 200
                            Latin words, combined with a handful of model sentence structures, to generate Lorem
                            Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from
                            repetition, injected humour, or non-characteristic words etc</p>
                    </div>

                    <h5 class="m-0">Lorem Ipsum is simply dummy text of the printing.</h5>
                    <div class="pane_p">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                            has been the industry's standard dummy text ever since the 1500s, when an unknown
                            printer took a galley of type and scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of
                            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                            publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                            has been the industry's standard dummy text ever since the 1500s, when an unknown
                            printer took a galley of type and scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of
                            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                            publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
 <script>
$(document).ready(function() {
    if ($(window).width() < 1025) {
        $('.dropdown-btn').click(function(event) {
            event.stopPropagation(); // Prevents the event from bubbling up

            let $currentDropdown = $(this).siblings('.dropdown-content');
            let $parentLi = $(this).closest('li');

            // Close other open dropdowns in the same parent ul
            $parentLi.siblings().find('.dropdown-content').slideUp();

            // Toggle the clicked dropdown
            $currentDropdown.slideToggle();
        });

        $('.toggle-dropdown').click(function(event) {
            event.preventDefault();
            let $submenu = $(this).siblings('.sub_menus');

            // Close other submenus
            $('.sub_menus').not($submenu).slideUp();

            // Toggle current submenu
            $submenu.slideToggle();
        });

        // Close dropdown when clicking outside
        $(document).click(function(event) {
            if (!$(event.target).closest('.dropdown').length) {
                $('.dropdown-content, .sub_menus').slideUp();
            }
        });
    }
});
</script>
<script>
	$(document).ready(function () {
    $(".navbar-toggler").click(function () {
        $(this).toggleClass("active");
        $("#navbarSupportedContent").slideToggle(300);
    });

    // Close menu when clicking outside
    $(document).click(function (event) {
        if (!$(event.target).closest(".navbar-toggler, #navbarSupportedContent").length) {
            $("#navbarSupportedContent").slideUp(300);
            $(".navbar-toggler").removeClass("active");
        }
    });

    // Close menu when clicking a menu item
    $('#navbarSupportedContent a').on('click', function () {
        $("#navbarSupportedContent").slideUp(300);
        $(".navbar-toggler").removeClass("active");
    });
});

</script>

@endsection('content')
