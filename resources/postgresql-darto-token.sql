CREATE TABLE public.preauth_tokens
(
  token_key character varying(128) NOT NULL,
  username character varying(16),
  created timestamp without time zone,
  expires timestamp without time zone,
  CONSTRAINT preauth_tokens_pkey PRIMARY KEY (token_key)
)
WITH (
  OIDS=FALSE
);
