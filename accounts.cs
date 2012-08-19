using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Byteplan_data
{
    #region Accounts
    public class Accounts
    {
        #region Member Variables
        protected int _id;
        protected string _username;
        protected string _password;
        protected string _salt;
        protected string _email;
        protected int _active;
        protected string _activation_code;
        #endregion
        #region Constructors
        public Accounts() { }
        public Accounts(string username, string password, string salt, string email, int active, string activation_code)
        {
            this._username=username;
            this._password=password;
            this._salt=salt;
            this._email=email;
            this._active=active;
            this._activation_code=activation_code;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Username
        {
            get {return _username;}
            set {_username=value;}
        }
        public virtual string Password
        {
            get {return _password;}
            set {_password=value;}
        }
        public virtual string Salt
        {
            get {return _salt;}
            set {_salt=value;}
        }
        public virtual string Email
        {
            get {return _email;}
            set {_email=value;}
        }
        public virtual int Active
        {
            get {return _active;}
            set {_active=value;}
        }
        public virtual string Activation_code
        {
            get {return _activation_code;}
            set {_activation_code=value;}
        }
        #endregion
    }
    #endregion
}