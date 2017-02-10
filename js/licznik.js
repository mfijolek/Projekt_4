/**
 * Created by sjedynak on 2016-11-14.
 */
// var counter1;
// var counter2;
// var counter3;
// var counter4;
var counter5;
var counter6;
var counter7;
var counter8;
// var counter9;
// var counter10;
// var counter11;

function CreateCounters()
{
    // counter1=new Licznik(90,"counter1","%",6);
    // counter2=new Licznik(74,"counter2","%",1);
    // counter3=new Licznik(50,"counter3","%",1);
    counter4=new Licznik(336,"counter4"," mg/d",6);
    // counter5=new Licznik(90,"counter5","%",6);
    // counter6=new Licznik(74,"counter6","%",1);
    // counter7=new Licznik(50,"counter7","%",1);
    counter8=new Licznik(336,"counter8"," mg/d",6);
    // counter9=new Licznik(55,"counter9","%",5);
    // counter10=new Licznik(48,"counter10","%",8);
    // counter11=new Licznik(30,"counter11","%",1);
}


function StopCounters()
{
    // counter1.Stop();
    // counter2.Stop();
    // counter3.Stop();
    // counter4.Stop();
    // counter5.Stop();
    // counter6.Stop();
    // counter7.Stop();
    counter8.Stop();
    // counter9.Stop();
    // counter10.Stop();
    // counter11.Stop();
}

// function InitFunc()
// {
//     counter1.Start();
//     counter2.Start();
//     counter3.Start();
// }

// function InitFunc2() {
//     counter4.Start();
// }

// function InitFunc3()
// {
//     counter5.Start();
//     counter6.Start();
//     counter7.Start();
// }

function InitFunc4() {
    counter8.Start();
}

// function InitFunc5()
// {
//     counter9.Start();
//     counter10.Start();
//     counter11.Start();
// }

function Licznik(liczba,elementid,sufix,skok) {
    this.liczbacel = liczba;
    this.wartosc = 0;
    this.elementid = elementid;
    this.czas_interwalu = 50;
    this.interwal = null;
    this.working=false;
    this.sufix=sufix;
    this.skok=skok;
    var self = this;

    this.Start = function () {
        if(this.working)
            return;
        this.wartosc=0;

        document.getElementById(self.elementid).innerHTML=this.wartosc+this.sufix;
        this.working=true;
        this.interwal = setInterval(this.Nastepny, this.czas_interwalu);
    };

    this.Stop = function () {
        if(this.working)
        {
            clearInterval(self.interwal);
            this.working=false;
        }
    };

    this.Nastepny = function () {

        self.wartosc+=self.skok;
        document.getElementById(self.elementid).innerHTML=self.wartosc+self.sufix;
        if (self.wartosc >= self.liczbacel) {

            clearInterval(self.interwal);
            self.working=false;
        }
    };

}

