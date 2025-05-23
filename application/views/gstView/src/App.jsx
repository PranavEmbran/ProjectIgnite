import React, { useState, useEffect } from 'react';
import '../../../../assets/hmis/styles/styleGST.css';

function App() {
  const [stateCode, setStateCode] = useState('');
  const [pan, setPan] = useState('');
  const [char13, setChar13] = useState('');
  const [char15, setChar15] = useState('');
  const [gstin, setGstin] = useState('');
  const [isManual, setIsManual] = useState(false); // ⬅️ new
  const [validationMsg, setValidationMsg] = useState('');


  // Auto-generate GSTIN unless it was manually edited
  useEffect(() => {
    const generated = stateCode.padStart(2, '0') + pan.toUpperCase() + char13.toUpperCase() + 'Z' + char15.toUpperCase();

    if (!isManual && generated.length === 15) {
      setGstin(generated);
      setValidationMsg(checksum(generated) ? '✅ Valid GSTIN' : '❌ Invalid GSTIN');
    } else if (!isManual) {
      setGstin('');
      setValidationMsg('');
    }
  }, [stateCode, pan, char13, char15]);


  function checksum(g) {
    const regTest = /\d{2}[A-Z]{5}\d{4}[A-Z]{1}[A-Z\d]{1}[Z]{1}[A-Z\d]{1}/.test(g);
    if (!regTest) return false;

    const a = 65, b = 55, c = 36;
    let p = 0;
    let i = 0;
    for (let k = 0; k < g.length; k++) {
      let j = g.charAt(k);
      let val = j.charCodeAt(0) < a ? parseInt(j) : j.charCodeAt(0) - b;
      val *= (k % 2 + 1);
      p = val > c ? 1 + (val - c) : val;
      if (k < 14) i += p;
      else return j === ((c - (i % c)) < 10 ? (c - (i % c)).toString() : String.fromCharCode((c - (i % c)) + b));
    }
    return false;
  }

  const handleClear = () => {
    setStateCode('');
    setPan('');
    setChar13('');
    setChar15('');
    setGstin('');
    setValidationMsg('');
    setIsManual(false);
  };


  const handleSubmit = (e) => {
    e.preventDefault();
    fetch('http://localhost/ProjectIgnite/index.php/GstValidation/insertGSTIN', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({
        stateid: stateCode,
        pannum: pan,
        ch13: char13,
        chZ: 'Z',
        ch15: char15,
        gstinName: gstin
      })
    }).then(res => res.json()).then(data => {
      alert(data.message || 'Submitted');
    }).catch(err => alert('Error: ' + err));
  };

  return (
    <div>
      <h1>GSTIN Validator</h1>
      <form onSubmit={handleSubmit}>
        <label htmlFor="state">State Code</label>
        <select id="state" value={stateCode} onChange={e => setStateCode(e.target.value)} required>
          <option value="" disabled>Select State</option>
          {[
            { code: '01', name: 'JAMMU AND KASHMIR' },
            { code: '02', name: 'HIMACHAL PRADESH' },
            { code: '03', name: 'PUNJAB' },
            { code: '04', name: 'CHANDIGARH' },
            { code: '05', name: 'UTTARAKHAND' },
            { code: '06', name: 'HARYANA' },
            { code: '07', name: 'DELHI' },
            { code: '08', name: 'RAJASTHAN' },
            { code: '09', name: 'UTTAR PRADESH' },
            { code: '10', name: 'BIHAR' },
            { code: '11', name: 'SIKKIM' },
            { code: '12', name: 'ARUNACHAL PRADESH' },
            { code: '13', name: 'NAGALAND' },
            { code: '14', name: 'MANIPUR' },
            { code: '15', name: 'MIZORAM' },
            { code: '16', name: 'TRIPURA' },
            { code: '17', name: 'MEGHALAYA' },
            { code: '18', name: 'ASSAM' },
            { code: '19', name: 'WEST BENGAL' },
            { code: '20', name: 'JHARKHAND' },
            { code: '21', name: 'ODISHA' },
            { code: '22', name: 'CHATTISGARH' },
            { code: '23', name: 'MADHYA PRADESH' },
            { code: '24', name: 'GUJARAT' },
            { code: '25', name: 'DAMAN AND DIU' },
            { code: '26', name: 'DADRA AND NAGAR HAVELI' },
            { code: '27', name: 'MAHARASHTRA' },
            { code: '28', name: 'ANDHRA PRADESH (BEFORE DIVISION)' },
            { code: '29', name: 'KARNATAKA' },
            { code: '30', name: 'GOA' },
            { code: '31', name: 'LAKSHWADEEP' },
            { code: '32', name: 'KERALA' },
            { code: '33', name: 'TAMIL NADU' },
            { code: '34', name: 'PUDUCHERRY' },
            { code: '35', name: 'ANDAMAN AND NICOBAR ISLANDS' },
            { code: '36', name: 'TELANGANA' },
            { code: '37', name: 'ANDHRA PRADESH (NEW)' },
          ].map(state => (
            <option key={state.code} value={state.code}>
              [{state.code}] {state.name}
            </option>
          ))}
        </select>

        <label htmlFor="pan">PAN no:</label>
        <input type="text" id="pan" value={pan} maxLength={10} onChange={e => setPan(e.target.value)} />

        <input style={{ width: '3em' }} type="text" id="char13" value={char13} maxLength={1} onChange={e => setChar13(e.target.value)} />
        <input style={{ width: '3em' }} type="text" value="Z" readOnly />
        <input style={{ width: '3em' }} type="text" id="char15" value={char15} maxLength={1} onChange={e => setChar15(e.target.value)} />

        <label htmlFor="gstin">GSTIN</label>
        <input
          type="text"
          id="gstin"
          value={gstin}
          maxLength={15}
          onChange={(e) => {
            const val = e.target.value.toUpperCase();
            setIsManual(true);
            setGstin(val);
            setValidationMsg(checksum(val) ? '✅ Valid GSTIN' : '❌ Invalid GSTIN');

            // ⬇️ Sync parts from GSTIN if 15 characters
            if (val.length === 15) {
              setStateCode(val.substring(0, 2));
              setPan(val.substring(2, 12));
              setChar13(val.charAt(12));
              setChar15(val.charAt(14));
            }


          }}
        />
        {/* <label id="gstinLabel">{validationMsg}</label> */}


        <label id="gstinLabel">{validationMsg}</label>

        <input type="button" value="Clear" onClick={handleClear} />
        <br /><br />
        <input type="submit" value="Save" />
        <br /><br />
        <input
          type="button"
          value="List GSTINs"
          // onClick={() => window.location.href = "http://localhost/ProjectIgnite/index.php/GstValidation/displayGSTIN_List"}
          onClick={() => window.location.href = "http://192.168.50.242/ProjectIgnite/index.php/GstValidation/displayGSTIN_List"}

        />
      </form>
    </div>
  );
}

export default App;
