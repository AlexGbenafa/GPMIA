import React from 'react';
import ReactDOM from 'react-dom';

export const UserForm = () => {
    return (
      <div className="USER-FORM">
        <div className="overlap-group-wrapper">
          <div className="overlap-group">
            <img
              className="rectangle"
              alt="Rectangle"
              src="https://generation-sessions.s3.amazonaws.com/28e0f9bef44287bb5395d149c792ee41/img/rectangle-52.svg"
            />
            <div className="rectangle-2" />
            <img
              className="line"
              alt="Line"
              src="https://generation-sessions.s3.amazonaws.com/28e0f9bef44287bb5395d149c792ee41/img/line-19.svg"
            />
            <div className="text-wrapper-2">Demande de dotations</div>
            <img
              className="asecna"
              alt="Asecna"
              src="https://generation-sessions.s3.amazonaws.com/28e0f9bef44287bb5395d149c792ee41/img/asecna-1@2x.png"
            />
            <TextInput className="text-input-state" />
            <TextInput className="text-input-state6" text="Nom" />
            <TextInput className="text-input-instance" text="Structure" />
            <TextInput className="text-input-state-instance" text="Fonction" />
            <TextInput
              className="text-input-state6-instance"
              text="Designation"
            />
            <TextInput
              className="design-component-instance-node"
              text="Commentaire"
            />
            <button className="img" />
          </div>
        </div>
      </div>
    );
  };