CREATE TABLE preauth_tokens
(
  token_key character varying(128) NOT NULL,
  username character varying(16),
  created datetime,
  expires datetime,
  CONSTRAINT preauth_tokens_pkey PRIMARY KEY (token_key)
);
