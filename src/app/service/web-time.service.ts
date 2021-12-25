import { HttpClient } from '@angular/common/http';
import { SelectorMatcher } from '@angular/compiler';
import { Injectable } from '@angular/core';
declare var $:any;

const baseUrl = "http://nplindia.in"
@Injectable({
  providedIn: 'root'
})
export class WebTimeService {

  Interval = 100;		// Refresh clock display every 100ms
  Offset:number = 0;	// Estimated offset (ms)
  diff_hour:string = '00';	// Estimated offset (ms)
  diff_min:string = '00';	// Estimated offset (ms)
  
  diff_minute:string = '00';	// Estimated offset (ms)
  diff_sec:string = '00';	// Estimated offset (ms)


  Results:any[] = new Array();

  constructor(
    private httpClient:HttpClient
  ) { }

  startclock() {
    alert("startClock");
    /*
    let LoopTimer = setInterval(this.showtime, this.Interval);
    fetch();
    new TodayClock($('div.today-clock'));*/
  }
/*
  display_date_time(timer:Date, parent:any)
{				
				var d = new Date(timer);
				months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
				
				day_array = new Array( 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

				currentYear = d.getUTCFullYear();
				month = d.getUTCMonth();
				var currentMonth = months[month];
				
				//currentMonth = currentMonth < 10 ? '0'+currentMonth : currentMonth;
				var currentDate = d.getUTCDate();
				currentDate = currentDate < 10 ? '0'+currentDate : currentDate;
				
				var day = d.getUTCDay();
				current_day = day_array[day];
				var hours = d.getUTCHours();
				var minutes = d.getUTCMinutes();
				var seconds = d.getUTCSeconds();


				hours = hours < 10 ? '0'+ hours : hours;
				minutes = minutes < 10 ? '0'+minutes : minutes;
				seconds = seconds < 10 ? '0'+seconds : seconds;

				var strTime = hours + ':' + minutes + ':' + seconds;
				
				$(parent).find('.year').html(currentMonth+' ' + currentDate + ', ' + currentYear);
				$(parent).find('.day').html(current_day);
				$(parent).find('.timer').html(strTime);
/*
				document.getElementById("year").innerHTML= currentDate + '-' + currentMonth+'-' + currentYear;
				document.getElementById("day").innerHTML= current_day ;
				document.getElementById("timer").innerHTML= strTime;
				
}

  showtime()
  {
    // This function uses Global Variables below:
    // Offset, Interval, SL, Text[]
  
    var now, tzoffset, sec, utcms, utcsec;
    var UTC, LOC, CMP;
  
    now = new Date();
  
    tzoffset = now.getTimezoneOffset() * 60000;	// in ms
    if (tzoffset > 12 * 3600000) tzoffset -= ( 24 * 3600000 );
  
    CMP = new Date( now.getTime() - tzoffset );
    
    
    //document.clock.LOCAL.value = ToDateStr(CMP);
    this.display_date_time(CMP, $('#device_clock'));
  
    if ( this.Results.length == 0 ) return;	// not ready
  
    utcms = now.getTime() + this.Offset + this.Interval / 2;
    utcsec = Math.floor( utcms / 1000 );
  
    let UTC_TIMESTAMP = new Date( utcms );
  
  
    let IST = new Date( utcms + 5.5 * 3600000 );	// IST = UTC + 9H
    //document.clock.IST.value = ToDateStr(IST);
    this.display_date_time(IST, $('#ist'));
  
    
  
    UTC = new Date( utcms );
    //document.clock.UTC.value = ToDateStr(UTC);
    this.display_date_time(UTC, $('#utc'));
  
  
    LOC = new Date( utcms - tzoffset );
    //document.clock.LOC.value = ToDateStr(LOC);
    this.display_date_time(LOC, $('#lst'));
  
    sec = Math.round( ( this.Offset / 1000 ) * 10 ) / 10;
    $('#clock_diff').removeClass();
    
    this.diff_sec = Math.abs(parseInt(sec.toString()));
    let a= sec;
    let b = this.diff_sec;

    let milli_sec = 0;
  
    if(sec < 0)
    {
      milli_sec =  (-1 *sec - this.diff_sec) * 10;	
    }
    else
    {
      milli_sec = (sec - this.diff_sec) * 10;	
    }
    milli_sec = parseInt(milli_sec.toString());	
  
    this.diff_hour = parseInt((this.diff_sec/3600).toString()).toString();
    this.diff_min = parseInt(((this.diff_sec%3600)/60).toString()).toString();
    this.diff_sec = (this.diff_sec%60).toString();
  
    if (parseInt(this.diff_hour) < 10) this.diff_hour = "0" + this.diff_hour;
    if (diff_min < 10) diff_min = "0" + diff_min;
    if (diff_sec < 10) diff_sec = "0" + diff_sec;
    
    if( sec == 0 ) {
      $('#diff_amt').html("00:00:00.0");
  
      //document.clock.offset.value = Text.correct;
      $('#clock_diff').addClass('green');
    } else {
      $('#clock_diff').addClass('red');
      
      $('#diff_amt').html(diff_hour + ":" + diff_min + ":" + diff_sec + "." + Math.abs(milli_sec) + ((sec < 0) ? " Fast" : " Slow"));
  
  /*
      $('#diff_amt').html(Math.abs(sec) +
        ((sec < 0) ? Text.fast : Text.slow));
  /*
      document.clock.offset.value = Math.abs(sec) +
        ((sec < 0) ? Text.fast : Text.slow);
        
    }
  }*/
}
