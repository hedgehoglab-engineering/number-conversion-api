bundle: .install.cli
	npx @redocly/openapi-cli bundle $(CURDIR)/openapi.yaml --output $(CURDIR)/openapi.bundle.yaml --ext yaml

lint: .install.cli
	npx @redocly/openapi-cli lint $(CURDIR)/openapi.yaml

.install.cli:
	@npm list -g @redocly/openapi-cli || npm install -g @redocly/openapi-cli
