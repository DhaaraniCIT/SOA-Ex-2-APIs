import flask
import sys
from flask import Flask,request,render_template,jsonify,json
from flask_cors import CORS

app = flask.Flask(__name__)
CORS(app)
app.config["DEBUG"] = True

def squareroot(number):
    lo = 0
    hi = number;
    while lo <= hi :
         mid = (lo + hi) / 2;
        #  mid = mid|0;
        #  print('jjj',mid,number)
         if(mid * mid > number):
            hi = mid - 1;
         else: 
            lo = mid + 1;
    return hi;

@app.route('/variation',methods=['GET'])
def variation():
    print("api hit")
    set1 = request.args.get('set1')	
    # set1=request.args.getlist("number")
    length1 = 0;
    mean = 0;
    sumofdiff = 0;
    diff = 0;
    pow =0; 
    sd = 0;
    i =0;
    arrset1 = [];
    for i in set1:
        if(i != ',' and i != '"'):
                mean += int(i);
                length1 += 1;
                arrset1.append(int(i));
    # console.log("meab",mean)
    mean /= length1;
    # console.log("meahb",mean)
    for i in arrset1 :
        diff = i - mean;
        pow = diff * diff;  
        sumofdiff +=pow;
    variation = sumofdiff/length1;
    # print( iation)
    sd = squareroot(variation);
    # console.log(" i", i,sd);
    # res.send({ iance :  i , StandardDeviation : sd});
    # sd=1
    #  iation = 2
    return jsonify({"SD":sd," iation": iation})

@app.route('/linear',methods=['GET'])
def linear():
    set1 = request.args.get('set1')
    set2 = request.args.get('set2')
    length1 = 0;
    length2 = 0;
    arrset1 = [];
    arrset2 = [];
    meanX = 0;
    meanX2 = 0;
    meanY = 0;
    a = 0;
    b = 0;
    xy = 0;
    sumxy = 0;
    x2 = 0;
    sumx2 = 0;
    for i in set1 :
        
        if i != ',' and i != '"':
            meanX += int(i);
            x2 = int(i)*int(i);
            sumx2 += x2;
            length1 +=1
            arrset1.append(int(i));
    meanX2 = meanX * meanX;
    for i in set2 :
        
        if i != ',' and i != '"' :
            meanY += int(i);
            length2 += 1
            arrset2.append(int(i));
    for i,j in zip(arrset1,arrset2) :
        xy = i*j;
        sumxy += xy;
    # console.log("answers",meanX,meanY,meanX2,sumx2,sumxy);
    sumxy = length1 * sumxy;
    X = meanY * meanX;
    meanXY = length1 * meanX2;
    bnum = sumxy - X;
    bdeno = meanXY - meanX2;
    b = bnum / bdeno;
    a1 = b*meanX
    adiff = meanY - a1;
    a = adiff / length1;
    # console.log("B",b,a);
    return jsonify({"b":round(b, 3),"a":round(a, 3)});

@app.route('/gcd',methods=['GET'])
def gcd():
    n1=request.args.get('set1')
    n2=request.args.get('set2')
    n1=int(n1)
    n2=int(n2)
    for i in range(n1, n2) :
    
        if n1%i==0 and n2%i==0 :
            gcd = i;
    
    lcm = (n1*n2)/gcd;

    return jsonify({"gcd" : gcd , "lcm" : lcm})

@app.route('/roots',methods=['GET'])
def roots():
    k=1;
    incre = 0.01;
    ans=0;
    i=1
    a = request.args.get('set1');
    b = request.args.get('set2');
    a=int(a)
    b=int(b)
    while i <= a :
        for j in range(b) :
            k=k*i;
        if a<k :
            ans = i-incre;
            return jsonify({"roots" : round(ans,3)})
            break;
        else:
            k=1;
        i += incre;

@app.route('/trigonometry',methods=['GET'])
def trigonometry():
    hypo=request.args.get('set1');
    adj =request.args.get('set2');
    opp =request.args.get('set3');
    hypo = int(hypo)
    adj = int(adj)
    opp = int(opp)

    sin = opp/hypo
    cos = adj/hypo
    tan = sin/cos
    sec = 1/sin
    cosec = 1/cos
    cot = 1/tan

    sin2 = sin*sin
    cos2 = cos*cos
    tan2 = tan*tan

    desin = 1-sin2
    desin = squareroot(desin)
    arcsin = 1/desin

    decos = 1-cos2
    decos = squareroot(decos)
    arccos = 1/decos

    detan = 1+tan2
    arctan = 1/detan

    return jsonify({"sin" : sin , "cos" : cos , "tan" : tan , "sec" : sec , "cosec" : cosec , "cot" : cot , "arcsin" : arcsin , "arccos" : arccos , "arctan" : arctan});

@app.route('/amps',methods=['GET'])
def amps():
    n1=request.args.get('set1');
    n2=request.args.get('set2');
    amp = n1/n2
    return jsonify({"amps":amp})

@app.route('/kw',methods=['GET'])
def kw():
    n1=request.args.get('set1');
    n2=request.args.get('set2');
    kw = (n1*n2)/1000;
    return jsonify({"kw":kw})

@app.route('/wh',methods=['GET'])
def wh():
    a=request.args.get('set1');
    b=request.args.get('set2');
    wh = a*b;
    return jsonify({"wh":wh})

@app.route('/kva',methods=['GET'])
def kva():
    a=request.args.get('set1');
    b=request.args.get('set2');
    kva = (a*b)/1000;
    va = a*b;
    return jsonify({"kva":kva,"va":va})

@app.route('/volts',methods=['GET'])
def vols():
    n1=request.args.get('set1');
    n2=request.args.get('set2');
    vol = n2/n1;
    return jsonify({"volts":vol})

@app.route('/watt',methods=['GET'])
def watt():
    n1=request.args.get('set1');
    n2=request.args.get('set2');
    watt = n2*n1;
    return jsonify({"watt":watt})

@app.route('/joules',methods=['GET'])
def joules():
    n1=request.args.get('set1');
    n2=request.args.get('set2');
    jol= n2*n1;
    return jsonify({"joules":jol})

@app.route('/mah',methods=['GET'])
def mah():
    n1=request.args.get('set1');
    n2=request.args.get('set2');
    mah= n2*n1*1000;
    return jsonify({"mah":mah})

@app.route('/log',methods=['GET'])
def log():
    n=1000.0
    x=request.args.get('set1')
    x = int(x)
    logs = n * ((x ** (1/n)) - 1)
    if logs < 0:
        log = 0
    else:
        log = n * ((logs ** (1/n)) - 1)
    antilog = 10**x
    return jsonify ({"ln":logs,"antilog":antilog,"log":log})
if __name__=='__main__':
	 app.run(debug=True) 