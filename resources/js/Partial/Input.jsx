import React from "react";
import styled from "styled-components";

const Input = ({type, name, placeholder}) => {
  return (
    <StyledWrapper>
      <div className="input-group">
        
        <input
          required
          type={type}
          name={name}
          autoComplete="off"
          className="input"
        />
        <label className="user-label">{placeholder}</label>
      </div>
    </StyledWrapper>
  );
};

const StyledWrapper = styled.div`
  .input-group {
 position: relative;
}

.input {
 border: solid 1px #9e9e9e;
 border-radius: 0.5rem;
 background: none;
 padding: 0.8rem;
 font-size: 1rem;
 color: #0C0C0C;
 transition: border 150ms cubic-bezier(0.4,0,0.2,1);
}

.user-label {
 position: absolute;
 left: 15px;
 font-size: 0.9rem;
 color: #00000054;
 pointer-events: none;
 transform: translateY(1rem);
 transition: 150ms cubic-bezier(0.4,0,0.2,1);
}

.input:focus, input:valid {
 outline: none;
 border: 1.5px solid #1a73e8;
}

.input:focus ~ label, input:valid ~ label {
 transform: translateY(-50%) scale(0.8);
 background-color: #fff;
 padding: 0 .2em;
 color: #2196f3;
}
`;

export default Input;
